<section class="section-name  padding-y-sm">
    <div class="container">
        <div class="row mb-4">
            <div class="col-3">
                Per page: &nbsp;
                <select wire:model="perPage" class="form-control">
                    <option>1</option>
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                </select>
            </div>
            <div class="col">
                Søg:
                <input wire:model="search" type="text" class="form-control" placeholder="Søg"/>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table mt-2">
                    <thead>
                    <tr>
                        <th>{{__('Id')}}</th>
                        <th>{{__('Name')}}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($result as $index => $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-primary" href="/[[folder]]/[model_name_as_plural_snake]/{{$row->id}}">
                                    {{__('Edit')}}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 text-muted">
                Viser {{$result->firstItem()}} til {{$result->lastItem()}} ud af {{$result->total()}} resultater
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    {{$result->links()}}
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</section>
