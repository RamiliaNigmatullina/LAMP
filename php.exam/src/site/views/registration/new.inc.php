<h1>Registration</h1>
<div>
  <?php
    if(!empty($data['generalNotice'])){
      echo '<div class="text-danger">'.$data['generalNotice'].'</div>';
    }
  ?>
  <form action="" method="POST">
    <div class="form-group<?=empty($data['notices']['username'])?'':' has-error'?>">
      <label class="control-label" for="reg-username">Username</label>
      <input type="text" class="form-control" id="reg-username" name="reg[username]" placeholder="Username"<?=empty($data['user']['username'])?'':'value="'.$data['user']['username'].'"'?>>
      <?=empty($data['notices']['username'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['username'].'</span>';?>
    </div>
    <div class="form-group<?=empty($data['notices']['email'])?'':' has-error'?>">
      <label for="reg-email">Email</label>
      <input type="email" class="form-control" id="reg-email" name="reg[email]" placeholder="Email"<?=empty($data['user']['email'])?'':'value="'.$data['user']['email'].'"'?>>
      <?=empty($data['notices']['email'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['email'].'</span>';?>
    </div>
    <div class="form-group<?=empty($data['notices']['full_name'])?'':' has-error'?>">
      <label class="control-label" for="reg-full_name">Full name</label>
      <input type="text" class="form-control" id="reg-full_name" name="reg[full_name]" placeholder="Name"<?=empty($data['user']['full_name'])?'':'value="'.$data['user']['full_name'].'"'?>>
      <?=empty($data['notices']['full_name'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['full_name'].'</span>';?>
    </div>
    <div class="form-group<?=empty($data['notices']['password'])?'':' has-error'?>">
      <label for="reg-password">Password</label>
      <input type="password" class="form-control" id="reg-password" name="reg[password]" placeholder="Password"<?=empty($data['user']['password'])?'':'value="'.$data['user']['password'].'"'?>>
      <?=empty($data['notices']['password'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['password'].'</span>';?>
    </div>
    <div class="form-group<?=empty($data['notices']['password-repeat'])?'':' has-error'?>">
      <label for="reg-password-repeat">Password Repeat</label>
      <input type="password" class="form-control" id="reg-password-repeat" name="reg[password-repeat]" placeholder="Password Repeat"<?=empty($data['user']['password-repeat'])?'':'value="'.$data['user']['password-repeat'].'"'?>>
      <?=empty($data['notices']['password-repeat'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['password-repeat'].'</span>';?>
    </div>
    <div class="form-group<?=empty($data['notices']['avatar'])?'':' has-error'?>">
      <label for="avatar">Avatar (URL)</label>
      <input type="text" class="form-control" id="regavatar" name="reg[avatar]" placeholder="Avatar (URL)"<?=empty($data['user']['avatar'])?'':'value="'.$data['user']['avatar'].'"'?>>
      <?=empty($data['notices']['avatar'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['avatar'].'</span>';?>
    </div>
    <div class="checkbox<?=empty($data['notices']['terms'])?'':' has-error'?>">
      <label>
        <input type="checkbox" name="reg[terms]"<?=empty($data['user']['terms'])?'':' checked'?>>Terms of Use are Accepted
      </label>
      <?=empty($data['notices']['terms'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['terms'].'</span>';?>
    </div>
    <button type="submit" class="btn btn-default" name="submitted">Register</button>
  </form>
</div>
