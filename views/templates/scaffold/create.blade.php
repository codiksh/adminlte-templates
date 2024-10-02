@@extends('layouts.app')

@@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
@if($config->options->localized)
                    @@lang('crud.create') @@lang('models/{!! $config->modelNames->camelPlural !!}.singular')
@else
                    Create {{ $config->modelNames->humanPlural }}
@endif
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @@include('adminlte-templates::common.errors')

        <div class="card">
            @{!! html()->form('POST', route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.store'))->open() !!}
                <div class="card-body">
                    <div class="row">
                        @@include('{{ $config->prefixes->getViewPrefixForInclude() }}{{ $config->modelNames->snakePlural }}.fields')
                    </div>
                </div>
                <div class="card-footer">
                    @{!! html()->submit('Save')->class('btn btn-primary') !!}
                    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.index') }}" class="btn btn-default">@if($config->options->localized) @@lang('crud.cancel') @else Cancel @endif</a>
                </div>
            @{!! html()->form()->close() !!}
        </div>

        </div>
    </div>
@@endsection
