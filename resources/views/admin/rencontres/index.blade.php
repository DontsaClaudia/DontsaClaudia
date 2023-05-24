@extends('layouts.admin')
@section('content')
@can('rencontre_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.rencontres.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.rencontre.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.rencontre.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Rencontre">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.rencontre.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.rencontre.fields.equipe_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.rencontre.fields.equipe_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.rencontre.fields.date_et_heure') }}
                        </th>
                        <th>
                            {{ trans('cruds.rencontre.fields.resultat_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.rencontre.fields.resultat_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.rencontre.fields.arbitre') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rencontres as $key => $rencontre)
                        <tr data-entry-id="{{ $rencontre->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $rencontre->id ?? '' }}
                            </td>
                            <td>
                                {{ $rencontre->equipe_1->nom_equipe ?? '' }}
                            </td>
                            <td>
                                {{ $rencontre->equipe_2->nom_equipe ?? '' }}
                            </td>
                            <td>
                                {{ $rencontre->date_et_heure ?? '' }}
                            </td>
                            <td>
                                {{ $rencontre->resultat_1 ?? '' }}
                            </td>
                            <td>
                                {{ $rencontre->resultat_2 ?? '' }}
                            </td>
                            <td>
                                {{ $rencontre->arbitre->name ?? '' }}
                            </td>
                            <td>
                                @can('rencontre_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.rencontres.show', $rencontre->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('rencontre_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.rencontres.edit', $rencontre->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('rencontre_delete')
                                    <form action="{{ route('admin.rencontres.destroy', $rencontre->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('rencontre_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rencontres.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Rencontre:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection