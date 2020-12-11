$(function(){

	$("#btn_add_service").click(function(){
		clearErrors();
		$("#form_service")[0].reset();
		$("#service_img_path").attr("src", "");
		$("#modal_service").modal();
	});

	
	$("#btn_upload_lash_img").change(function(){
		uploadImg($(this), $("#service_img_path"), $("#service_img"));
	});

	$("#btn_upload_user_img").change(function(){
		enviarImg($(this), $("#user_img_path"), $("#user_img"));
	});


	$("#form_service").submit(function(){

		$.ajax({
			type: "POST",
			url: BASE_URL + "admin/ajax_save_service",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function(){
				clearErrors();
				$("#btn_save_service").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response){
				clearErrors();
				if(response["status"]){
					$("#modal_service").modal("hide");
					swal("Sucesso!", "Método salvo com sucesso!", "success");
					dt_service.ajax.reload();
				}else{
					showErrorsModal(response["error_list"]);
				}
			}
		})

		return false;
	});

	function active_btn_service(){

		$(".btn-edit-service").click(function(){
			$.ajax({
				type: "POST",
				url: BASE_URL + "admin/ajax_get_service_data",
				dataType: "json",
				data: {"service_id": $(this).attr("service_id")},
				success: function(response) {
					clearErrors();
					$("#form_service")[0].reset();
					$.each(response["input"], function(id, value) {
						$("#"+id).val(value);
					});
					$("#service_img_path").attr("src", response["img"]["service_img_path"]);
					$("#modal_service").modal();
				}
			})
		});


		$(".btn-del-service").click(function(){
			
			service_id = $(this);
			swal({
				title: "Atenção!",
				text: "Deseja deletar esse curso?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d9534f",
				confirmButtonText: "Sim",
				cancelButtontext: "Não",
				closeOnConfirm: true,
				closeOnCancel: true,
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "POST",
						url: BASE_URL + "admin/ajax_delete_service_data",
						dataType: "json",
						data: {"service_id": service_id.attr("service_id")},
						success: function(response) {
							swal("Sucesso!", "Ação executada com sucesso", "success");
							dt_service.ajax.reload();
						}
					})
				}
			})

		});


	}

	var dt_service = $("#dt_services").DataTable({
		"oLanguage": DATATABLE_PTBR,
		"autoWidth": false,
		"processing": true,
		"serverSide": true,
		"ajax":{
			"url": BASE_URL + "admin/ajax_list_service",
			"type": "POST",
		},
		"columnDefs":[
			{ targets: "no-sort", orderable: false},
			{ targets: "dt-center",className: "dt-center"},
		],
		"drawCallback": function() {
			active_btn_service();
		}
	});
})