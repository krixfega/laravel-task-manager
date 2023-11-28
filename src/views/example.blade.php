<!DOCTYPE html>
<html>
<head>
  <title>Task Management App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!--Bootstrap CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  
  <!-- Main CSS -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
</head>
<body>

  <div id="taskApp">
    <!-- Vue app will be rendered here -->
    <task-list></task-list> 
  </div>

  
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
