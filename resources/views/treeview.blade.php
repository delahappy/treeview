<div class="row mt-2 p-4">
    <div class="card">
        <div class="card-header">
            {{{$tree->name}}}
            <button class="btn btn-link btn-sm add-factory-btn" type="button" data-toggle="modal" data-target="#addFactoryModal">
                add factory
            </button>
        </div>
        <div class="card-body">
            <div class="row">
                <ul class="list-group" id="factoryListGroup">
                    @foreach($tree->factories as $factory)
                        <li class="list-group-item active" target="{{$factory->id}}">
                            <div class="float-left">
                                {{{$factory->name}}}
                            </div>
                            <div class="float-right ml-5">
                                <button class="btn update-factory-button" target="{{$factory->id}}" type="button"
                                        data-toggle="modal" data-target="#updateFactoryModal">
                                    update
                                </button>
                                <button class="btn delete-factory-button btn-warning" target="{{$factory->id}}" type="button">delete</button>
                            </div>
                        </li>
                        @foreach($factory->nodes as $node)
                            <li class="list-group-item ml-5 node" target="{{$factory->id}}">{{{$node->value}}}</li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Add Factory Modal -->
<div class="modal fade" id="addFactoryModal" tabindex="-1" role="dialog" aria-labelledby="addFactoryModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFactoryModalLabel">add factory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form target="/api/factory" method="post" id="addFactoryForm">
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">factory name</span>
                        </div>
                        <input name="name" id="newFactoryName" type="text" class="form-control" required>
                        <input name="treeId" id="newFactoryTreeId" type="hidden" value="{{$tree->id}}">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">number of children</span>
                        </div>
                        <input name="numberOfChildren" id="numberofNewFactoryChildren" type="number" class="form-control"
                               min="1" max="15" step="1" placeholder="default 1, max 15">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">lower bound</span>
                        </div>
                        <input name="lowerBounds" id="newFactoryLowerBounds" type="number" class="form-control"
                               step="1" placeholder="default 0">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">upper bound</span>
                        </div>
                        <input name="upperBounds" id="newFactoryUpperBounds" type="number" class="form-control"
                               step="1" placeholder="default 1">
                    </div>
                    <div class="row">
                        <small class="text-muted m-3">Invalid combinations will result in using defaults or max values</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="addFactoryButton" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Factory Modal -->
<div class="modal fade" id="updateFactoryModal" tabindex="-1" role="dialog" aria-labelledby="updateFactoryModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateFactoryModalLabel">update factory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form target="/api/factory" method="put" id="updateFactoryForm">
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">factory name</span>
                        </div>
                        <input name="name" id="updateFactoryName" type="text" class="form-control" required>
                        <input name="factoryId" id="updateFactoryFactoryId" type="hidden" value="">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">number of children</span>
                        </div>
                        <input name="numberOfChildren" id="updateFactoryNumberOfChildren" type="number" class="form-control"
                               min="1" max="15" step="1" placeholder="default 1, max 15">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">lower bound</span>
                        </div>
                        <input name="lowerBounds" id="updateFactoryLowerBounds" type="number" class="form-control"
                               step="1" placeholder="default 0">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">upper bound</span>
                        </div>
                        <input name="upperBounds" id="updateFactoryUpperBounds" type="number" class="form-control"
                               step="1" placeholder="default 1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="updateFactoryButton" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
