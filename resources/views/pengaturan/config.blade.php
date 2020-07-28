<h4 class="font-w400">ID Konfigurasi</h4>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-vcenter" id="tabel">
		<thead>
			<tr>
				<th class="text-center" style="width: 80px;">No</th>
				<th>Config Name</th>
				<th>Table Source</th>
				<th>Config Value</th>
				<th>Description</th>
				{{-- <th>Status Pegawai</th> --}}
				<th style="width: 15%;">Aksi</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
</div>
 <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
  </div>

@push('js')
<script type="text/javascript">
	$(function() {
		$('.trash-ck').click(function(){
			if ($('.trash-ck').prop('checked')) {
				document.location = '{{ url("config-id?status=trash") }}';
			} else {
				document.location = '{{ url("config-id") }}';
			}
		});
		$('#tabel').DataTable({
			pagingType: "full_numbers",
			pageLength: 10,
			lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]],
			autoWidth: true,
			stateSave: true,
			processing : true,
			serverSide : true,
			ajax : {
				url:"{{ url('pengaturan/get-data') }}",
				data: function (d) {

				}
			},
			columns: [
			{ data: 'nomor', name: 'nomor',searchable:false,orderable:false },
			{ data: 'config_name', name: 'config_name' },
			{ data: 'table_source', name: 'table_source' },
			{ data: 'config_value', name: 'config_value' },
			{ data: 'description', name: 'description' },
			{ data: 'action', name: 'action', orderable: false, searchable: false },
			],
			language: {
				lengthMenu : '{{ "Menampilkan _MENU_ data" }}',
				zeroRecords : '{{ "Data tidak ditemukan" }}' ,
				info : '{{ "_PAGE_ dari _PAGES_ halaman" }}',
				infoEmpty : '{{ "Data tidak ditemukan" }}',
				infoFiltered : '{{ "(Penyaringan dari _MAX_ data)" }}',
				loadingRecords : '{{ "Memuat data dari server" }}' ,
				processing :    '{{ "Memuat data data" }}',
				search :        '{{ "Pencarian:" }}',
				paginate : {
					first :     '{{ "<" }}' ,
					last :      '{{ ">" }}' ,
					next :      '{{ ">>" }}',
					previous :  '{{ "<<" }}'
				}
			},
			aoColumnDefs: [{
				bSortable: false,
				aTargets: [-1]
			}],
			iDisplayLength: 5,
			aLengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
		});
	});
</script>
@endpush