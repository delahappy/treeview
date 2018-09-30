<?php

namespace App\Http\Controllers;

use App\Events\CreateFactory;
use App\Events\DeleteFactory;
use App\Events\UpdateFactory;
use App\Factory;
use App\Node;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FactoryController extends Controller
{
    public function create(Request $request) {
        list($lowerBounds, $upperBounds) = $this->generateBounds($request);

        Log::info($lowerBounds . ' : ' . $upperBounds);
        $factory = new Factory();
        $factory->name = $request->get('name');
        $factory->tree_id = $request->get('treeId');
        $factory->lower_bound = $lowerBounds;
        $factory->upper_bound = $upperBounds;
        $factory->save();

        $this->generateNodes($request, $factory, $lowerBounds, $upperBounds);

        event(new CreateFactory($factory->load('nodes')));
        return response()->json($factory->load('nodes'));
    }

    public function delete($id) {
        Factory::find($id)->delete();
        event(new DeleteFactory($id));
        return response()->json(['id'=>$id]);
    }

    public function update(Request $request, $id) {
        list($lowerBounds, $upperBounds) = $this->generateBounds($request);
        $factoryId = $request->get('factoryId');
        $factory = Factory::find($factoryId);
        $factory->name = $request->get('name');
        $factory->lower_bound = $lowerBounds;
        $factory->upper_bound = $upperBounds;
        $factory->save();

        Node::where('factory_id','=',$factoryId)->delete();

        $this->generateNodes($request, $factory, $lowerBounds, $upperBounds);
        $factory->load('nodes');
        event(new UpdateFactory($factory));
        return response()->json($factory->load('nodes'));
    }

    public function get($id) {
        $factory = Factory::find($id);
        $numberOfChildren = $factory->nodes->count();
        $factory->number_of_children = $numberOfChildren;
        return response()->json($factory);
    }

    /**
     * @param Request $request
     * @param $factory
     * @param $lowerBounds
     * @param $upperBounds
     */
    public function generateNodes(Request $request, $factory, $lowerBounds, $upperBounds): void
    {
        $numberOfChildren = (int)$request->get('numberOfChildren');
        if($numberOfChildren > 15) {
            $numberOfChildren = 15;
        }
        // Use abs in case the user gets a negative number through.
        for ($i = 0; $i < abs($numberOfChildren); $i++) {
            $node = new Node();
            $node->factory_id = $factory->id;
            $node->value = rand($lowerBounds, $upperBounds);
            $node->save();
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function generateBounds(Request $request): array
    {
        $lowerBounds = (int)$request->get('lowerBounds');
        $upperBounds = (int)$request->get('upperBounds');
        /*
         * For safety sake.  Just in case the user is about to get an invalid bounds combo to the controller.
         */
        if (($lowerBounds >= $upperBounds)) {
            $lowerBounds = 0;
            $upperBounds = 1;
        }
        return array($lowerBounds, $upperBounds);
    }
}
