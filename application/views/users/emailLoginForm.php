<?php
/**
 * User add by email
 *
 * @category  View
 * @package   user
 * @author    Gongjam <guruahn@gmail.com>
 * @copyright Copyright (c) 2014
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @version   1.0
 **/
?>


<div id="wrapper">
    <h2><?php echo $title;?></h2>
    <form action="<?php echo _BASE_URL_;?>/users/emailLogin" method="post" name="emailLoginForm">
        <input type="hidden" name="ip" value="<?php echo $_SERVER['SERVER_ADDR']; ?>" />
        <input type="hidden" name="referer" value="<?php echo (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "" ); ?>" />
        <ul>

            <li>
                <label for="user_id">email</label>
                <input name="user_id" id="user_id" type="text" size="30" value="" />
                <input name="is_save_id" id="is_save_id" type="checkbox" /> is save id
            </li>
            <li>
                <label for="password">password</label>
                <input name="password" id="password" type="text" size="30" value="" />
            </li>

        </ul>
        <p><input type="submit" value="submit" /> </p>
    </form>
</div>