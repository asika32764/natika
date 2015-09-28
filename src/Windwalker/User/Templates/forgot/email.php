<?php
/**
 * Part of Windwalker project.
 *
 * @copyright  Copyright (C) 2014 - 2015 LYRASOFT. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

?>
<p>
	Hi <?php echo $data->user->name; ?>
</p>

<p>
	You send a password reset require at this site.
</p>

<p>
	Your token is: <code><?php echo $data->token; ?></code>
</p>

<p>
	Please go to: <a href="<?php echo $data->link; ?>"><?php echo $data->link; ?></a> to reset your password.
</p>
