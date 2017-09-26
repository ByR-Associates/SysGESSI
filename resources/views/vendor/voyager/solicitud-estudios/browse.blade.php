@extends('voyager::master')

@section('page_title','All '.$dataType->display_name_plural)

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-news"></i> {{ $dataType->display_name_plural }}
        @if (Voyager::can('add_'.$dataType->name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success">
                <i class="voyager-plus"></i> Add New
            </a>
        @endif
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    @foreach($dataType->browseRows as $row)
                                        @if( $row->display_name == 'Progreso')
                                            <th style="width:100px">{{ $row->display_name }}</th>
                                        @else
                                            <th>{{ $row->display_name }}</th>
                                        @endif
                                    @endforeach
                                    <th class="actions" style="width: 220px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataTypeContent as $data)
                                <tr>
                                    @foreach($dataType->browseRows as $row)
                                    <td>
                                        @if($row->type == 'image')
                                            <img src="@if( strpos($data->{$row->field}, 'http://') === false && strpos($data->{$row->field}, 'https://') === false){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">

                                        @elseif($row->type == 'progress_bar')                             
                                            <div class="progress progress-md ">
                                                @if($data->{$row->field} >= 1 && $data->{$row->field} <= 24)
                                                    <div 
                                                        class="progress-bar progress-bar-danger progress-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ $data->{$row->field} }}%;" >{{ $data->{$row->field} }}%              
                                                    </div>
                                                @elseif($data->{$row->field} >= 25 && $data->{$row->field} <= 49)
                                                    <div 
                                                        class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ $data->{$row->field} }}%;" >{{ $data->{$row->field} }}%              
                                                    </div>
                                                 @elseif($data->{$row->field} >= 50 && $data->{$row->field} <= 74)
                                                    <div 
                                                        class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ $data->{$row->field} }}%;" >{{ $data->{$row->field} }}%              
                                                    </div>
                                                 @elseif($data->{$row->field} >= 75 && $data->{$row->field} <= 99)
                                                    <div 
                                                        class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ $data->{$row->field} }}%;" >{{ $data->{$row->field} }}%              
                                                    </div>
                                                 @else
                                                    <div 
                                                        class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: {{ $data->{$row->field} }}%;" >{{ $data->{$row->field} }}%              
                                                    </div>
                                                @endif
                                            </div>
                                        @elseif($row->type == 'status')
                                            @if($data->{$row->field} == 'Finalizado')
                                                <span class="label label-success">{{ $data->{$row->field} }}</span>
                                            @elseif($data->{$row->field} == 'Anulado')
                                                <span class="label label-default">{{ $data->{$row->field} }}</span>
                                            @else
                                                <span class="label label-info">{{ $data->{$row->field} }}</span>
                                            @endif
                                        @else
                                            @if(is_field_translatable($data, $row))
                                                @include('voyager::multilingual.input-hidden', [
                                                    '_field_name'  => $row->field,
                                                    '_field_trans' => get_field_translations($data, $row->field)
                                                ])
                                            @endif
                                            @if($row->field == 'cliente_id')
                                                <span>
                                                {{ (STD\Cliente::find($data->{$row->field}))->getFullName() }}</span>
                                                
                                            @else
                                                <span>{{ $data->{$row->field} }}</span>
                                            @endif
                                        @endif
                                    </td>

                                    @endforeach
                                    <td class="no-sort no-click">
                                        @if (Voyager::can('delete_'.$dataType->name))
                                            <div class="btn-sm btn-danger pull-right delete" data-id="{{ $data->id }}">
                                                <i class="voyager-trash"></i> Delete
                                            </div>
                                        @endif
                                        @if (Voyager::can('edit_'.$dataType->name))
                                            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $data->id) }}" class="btn-sm btn-primary pull-right edit">
                                                <i class="voyager-edit"></i> Edit
                                            </a>
                                        @endif
                                        @if (Voyager::can('read_'.$dataType->name))
                                            <a href="{{ route('voyager.'.$dataType->slug.'.show', $data->id) }}" class="btn-sm btn-warning pull-right">
                                                <i class="voyager-eye"></i> View
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (isset($dataType->server_side) && $dataType->server_side)
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite">Showing {{ $dataTypeContent->firstItem() }} to {{ $dataTypeContent->lastItem() }} of {{ $dataTypeContent->total() }} entries</div>
                            </div>
                            <div class="pull-right">
                                {{ $dataTypeContent->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> Are you sure you want to delete this {{ $dataType->display_name_singular }}?
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Yes, Delete This {{ $dataType->display_name_singular }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    {{-- DataTables --}}
    <script>
        $(document).ready(function () {
            @if (!$dataType->server_side)
                $('#dataTable').DataTable({ "order": [] });
            @endif
            @if ($isModelTranslatable)
                $('.side-body').multilingual();
            @endif
        });

        $('td').on('click', '.delete', function(e) {
            $('#delete_form')[0].action = $('#delete_form')[0].action.replace('__id', $(e.target).data('id'));
            $('#delete_modal').modal('show');
        });
    </script>
    @if($isModelTranslatable)
        <script src="{{ voyager_asset('js/multilingual.js') }}"></script>
    @endif
@stop
