<div class="row mt-2">
    <div class="card">
        <div class="card-header">
            {{{$tree->name}}}
            <button class="btn btn-link btn-sm add-factory-btn" type="button" data-toggle="modal" data-target="#addFactoryModal">
                add factory
            </button>
        </div>
        <div class="card-body">
            <p>body</p>
        </div>
    </div>
</div>


<!-- Add Add Factory Modal -->
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
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">number of children</span>
                        </div>
                        <input name="numberOfChildren" id="numberofNewFactoryChildren" type="text" class="form-control"
                               placeholder="default 1">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">lower bound</span>
                        </div>
                        <input name="lowerBounds" id="newFactoryLowerBounds" type="text" class="form-control"
                               placeholder="default 0">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">upper bound</span>
                        </div>
                        <input name="upperBounds" id="newFactoryUpperBounds" type="text" class="form-control"
                               placeholder="default 1">
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