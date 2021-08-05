<section class="section-name  padding-y-sm">
    <div class="container">
        <form wire:submit.prevent="save">
            <div class="row mb-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>
                                <i class="fas fa-user"></i> [model]
                            </strong>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="formNumber" class="font-weight-bold">{{_('Name')}}</label>
                                        <input id="formNumber" wire:model.defer="[model-snake].name" class="form-control @error('[model-snake].name') is-invalid @enderror" type="text" autocomplete="off">
                                        @error('[model-snake].name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" wire:model.defer="[model-snake].is_admin" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label"  for="exampleCheck1">Administrator</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col">

                </div>

            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </div>
            </div>
        </form>
    </div>
</section>
