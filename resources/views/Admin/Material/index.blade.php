<!-- Page header -->
<section class="content-header">
    <h1>{{$title}}</h1>
{{--    <a href="{{route('materials.create', ['method'=>'2'])}}" class="btn btn-success">{{ __('Create') }}</a>--}}
    <div class="dropdown">
        <a class="btn btn-success dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Create
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownLink">
            @foreach($methods as $method)
                <a class="dropdown-item" href="{{route('materials.create', ['method'=> $method->id])}}">{{$method->title}}</a>
            @endforeach
        </div>
    </div>
</section>
<!-- /page header -->

<!-- Content area -->
<div class="content">
    <!-- Hover rows -->
    <div class="card">
        <div class="table-responsive">
            @if($materials)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Alias') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($materials as $material)
                        <tr>
                            <td>{{$material->id}}</td>
                            <td>{{$material->title}}</td>
                            <td>{{$material->alias}}</td>
                            <td>
                                <a href="{{route('materials.edit',['material'=>$material->id])}}"
                                   class="btn btn-primary btn-labeled">{{ __('Edit') }}
                                </a>


                                <form method="post"  action="{{route('materials.delete',['material'=>$material->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger">{{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    <div style="display:none">
                        <form method="post" id="contact-applications-delete" action="">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <!-- /hover rows -->

</div>
<!-- /content area -->
