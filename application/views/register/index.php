<h2>Register</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('register/index'); ?>
<ul>
  <li>
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo set_value('email') ?>">
  </li>
  <li>
    <label for="planet">Planet Name</label>
    <input type="input" name="planet" value="<?php echo set_value('planet') ?>">
  </li>
  <li>
    <label for="race">Race</label>
    <select name="race">
      <option></option>
<?php foreach ($races as $race_array): ?>
      <option value="<?php echo $race_array['id'] ?>" <?php if (set_value('race') == $race_array['id']) { echo "selected"; } ?>><?php echo $race_array['name'] ?></option>
<?php endforeach; ?>
    </select>
  </li>
  <li>
    <label for="password">Password</label>
    <input type="password" name="password">
  </li>
  <li>
    <label for="password2">Repeat Password</label>
    <input type="password" name="password2">
  </li>
  <li><input type="submit" name="submit" value="Create User"></li>
</ul>
</form>
