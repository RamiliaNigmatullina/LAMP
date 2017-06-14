<h1>New post</h1>
<div>
  <form action="" method="POST">
    <div class="form-group<?=empty($data['notices']['title'])?'':' has-error'?>">
      <label class="control-label" for="post-title">Title</label>
      <input type="text" class="form-control" id="post-title" name="post[title]" <?=empty($data['post']['title'])?'':'value="'.$data['post']['title'].'"'?>>
      <?=empty($data['notices']['title'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['title'].'</span>';?>
    </div>
    <div class="form-group<?=empty($data['notices']['body'])?'':' has-error'?>">
      <label for="post-body">Body</label>
      <textarea class="form-control" rows="10" id="post-body" name="post[body]"><?=empty($data['post']['body'])?'':$data['post']['body'];?></textarea>
      <?=empty($data['notices']['body'])?'':'<span id="helpBlock" class="help-block">'.$data['notices']['body'].'</span>';?>
    </div>
    <button type="submit" class="btn btn-default" name="submitted">Save</button>
  </form>
</div>
