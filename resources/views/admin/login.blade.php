<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Connexion Admin</title>

   <link rel="stylesheet" href="{{ asset('css/loginadmin.css') }}">

  <link rel="shortcut icon" href="../image/faviconOB.png" type="image/x-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

</head>

<body>
@if($errors->any())
  <div style="color:red;">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
@endif

  <div class="login-container">
    <div class="login-card glassmorph">
      <h2 class="title">Admin Dashboard</h2>
    <form action="{{ route('admin.login') }}" method="POST" class="login-form">
  @csrf

        <div class="input-group">
          <i class="ri-user-fill icon"></i>
          <input type="text" name="ID" placeholder="admin ID" required>
        </div>
        
        <div class="input-group">
          <i class="ri-lock-fill icon"></i>
          <input type="password" name="password" placeholder="Mot de passe" required>
        </div>

        <div class="actions">
          <button type="submit" class="login-btn">
            <i class="ri-login-circle-fill"></i> Connexion
          </button>
          
        
      </form>
    </div>
  </div>

</body>
</html>
