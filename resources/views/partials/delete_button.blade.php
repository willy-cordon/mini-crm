<form id="delete-form-{{$model->id}}" action="{{ route($destroy_method, $model->id) }}" method="POST"  style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <a class="btn btn-danger btn-icon btn-sm m-1" data-toggle="modal" data-target="#confirm-submit-{{$model->id}}">
        <span class="ul-btn__icon"><i class="fas fa-times-circle"></i></span>
    </a>

    <div class="modal fade" id="confirm-submit-{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Borrar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ trans('global.areYouSure') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('global.no') }}</button>
                    <button type="button" class="btn btn-primary" onclick="$(this).closest('form').submit();">{{ trans('global.yes') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
