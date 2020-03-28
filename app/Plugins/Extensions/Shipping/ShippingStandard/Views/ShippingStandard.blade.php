@extends('admin.layout')

@section('main')
          <div class="box-header with-border">
              <h2 class="box-title">{{ $title_description??'' }}</h2>

              <div class="box-tools">
                  <div class="btn-group pull-right" style="margin-right: 5px">
                      <a href="{{ route('admin_extension',['extensionGroup'=>'Shipping']) }}" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> {{trans('admin.back_list')}}</span></a>
                  </div>
              </div>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{ trans($pathPlugin.'::ShippingStandard.min_total') }}</th>
                    <th>{{ trans($pathPlugin.'::ShippingStandard.max_total') }}</th>
                    <th>{{ trans($pathPlugin.'::ShippingStandard.fee') }}</th>
                    <th>{{ trans($pathPlugin.'::ShippingStandard.is_free') }}</th>
                    <th>{{ trans($pathPlugin.'::ShippingStandard.status') }}</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($datas as $index => $data)
                    <tr>
                        <td>
                            <a href="#" class="updateData_num"
                               data-name="min_total"
                               data-type="text"
                               data-pk="{{ $data['id'] }}"
                               data-url="{{ route('admin_extension.process',['group'=>$group,'key'=>$key]) }}"
                               data-title="{{ trans($pathPlugin.'::ShippingStandard.min_total') }}">
                                {{ $data['min_total'] }}
                            </a>
                        </td>
                        <td>
                            <a href="#" class="updateData_num"
                               data-name="max_total"
                               data-type="text"
                               data-pk="{{ $data['id'] }}"
                               data-url="{{ route('admin_extension.process',['group'=>$group,'key'=>$key]) }}"
                               data-title="{{ trans($pathPlugin.'::ShippingStandard.max_total') }}">
                                {{ $data['max_total'] }}
                            </a>
                        </td>
                        <td>
                            <a href="#" class="updateData_num"
                               data-name="fee"
                               data-type="text"
                               data-pk="{{ $data['id'] }}"
                               data-url="{{ route('admin_extension.process',['group'=>$group,'key'=>$key]) }}"
                               data-title="{{ trans($pathPlugin.'::ShippingStandard.fee') }}">
                                {{ $data['fee'] }}
                            </a>
                        </td>
                        <td>
                            <a href="#" class="updateData_num"
                               data-name="is_free"
                               data-type="select"
                               data-source ="{{ json_encode([['value' => 1, 'text' => 'Yes'], ['value' => '0', 'text' => 'No']]) }}"
                               data-pk="{{ $data['id'] }}"
                               data-url="{{ route('admin_extension.process',['group'=>$group,'key'=>$key]) }}"
                               data-title="{{ trans($pathPlugin.'::ShippingStandard.is_free') }}">
                                {{ $data['is_free'] === 1 ? "Yes" : "No"  }}
                            </a>
                        </td>
                        <td>
                            <a href="#" class="updateData_num"
                               data-name="status"
                               data-type="select"
                               data-source ="{{ json_encode([['value' => 1, 'text' => 'Active'], ['value' => '0', 'text' => 'Disabled']]) }}"
                               data-pk="{{ $data['id'] }}"
                               data-url="{{ route('admin_extension.process',['group'=>$group,'key'=>$key]) }}"
                               data-title="{{ trans($pathPlugin.'::ShippingStandard.status') }}">
                                {{ $data['status'] === 1 ? "Active" : "Disabled"  }}
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
@endsection

@push('styles')
<!-- Ediable -->
<link rel="stylesheet" href="{{ asset('admin/plugin/bootstrap-editable.css')}}">
@endpush

@push('scripts')
<!-- Ediable -->
<script src="{{ asset('admin/plugin/bootstrap-editable.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {

    $.fn.editable.defaults.params = function (params) {
      params._token = "{{ csrf_token() }}";
      return params;
    };

    $('.updateData_num').editable({
    ajaxOptions: {
    type: 'put',
    dataType: 'json'
    },
    validate: function(value) {
        if (value == '') {
            return '{{  trans('admin.not_empty') }}';
        }
        if (!$.isNumeric(value)) {
            return '{{  trans('admin.only_numeric') }}';
        }
    }
    });

    $('.updateData').editable({
    ajaxOptions: {
    type: 'put',
    dataType: 'json'
    },
    validate: function(value) {
        if (value == '') {
            return '{{  trans('admin.not_empty') }}';
        }
    }
    });

    $('.updateData_can_empty').editable({
    ajaxOptions: {
    type: 'put',
    dataType: 'json'
    }
    });
});

</script>

@endpush
