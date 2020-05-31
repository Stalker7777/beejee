<div id="form-task">
    
    <div class="form-group text-danger">
        <?= $error_text ?>
    </div>
    
    <form action="<?= $form ?>" method="post">

        <input name="current_page" type="hidden" value="<?= isset($current_page) ? $current_page : '' ?>">
        <input name="order_name" type="hidden" value="<?= isset($order_name) ? $order_name : '' ?>">
        <input name="order_email" type="hidden" value="<?= isset($order_email) ? $order_email : '' ?>">
        <input name="order_status" type="hidden" value="<?= isset($order_status) ? $order_status : '' ?>">

        <input name="id" type="hidden" value="<?= isset($data_form['id']) ? $data_form['id'] : '' ?>">
        
        <div class="form-group">
            <?php if(strcmp($form, 'index.php?form=create_task') == 0) { ?>
                <label><span class="text-danger">* </span>Имя</label>
                <input class="form-control" name="name" type="text" value="<?= isset($data_form['name']) ? $data_form['name'] : '' ?>">
            <?php } else { ?>
                <label>Имя: <?= $data_form['name'] ?></label>
            <?php } ?>
        </div>
        
        <div class="form-group">
            <?php if(strcmp($form, 'index.php?form=create_task') == 0) { ?>
                <label><span class="text-danger">* </span>Email</label>
                <input class="form-control" name="email" type="text" value="<?= isset($data_form['email']) ? $data_form['email'] : '' ?>">
            <?php } else { ?>
                <label>Email: <?= $data_form['email'] ?></label>
            <?php } ?>
        </div>
    
        <div class="form-group">
            <?php if(strcmp($form, 'index.php?form=create_task') == 0) { ?>
                <label><span class="text-danger">* </span>Текст задачи</label>
                <textarea class="form-control" rows="10" cols="45" name="task"><?= isset($data_form['task']) ? $data_form['task'] : '' ?></textarea>
                <?php /* <input name="task" type="text" value="<?= isset($data_form['task']) ? $data_form['task'] : '' ?>"> */ ?>
            <?php } else { ?>
                <label>Текст задачи: <?= $data_form['task'] ?></label>
            <?php } ?>
        </div>
    
        <div class="form-group">
            <?php if(strcmp($form, 'index.php?form=create_task') == 0) { ?>
            <?php } else { ?>
                <label>Выполнено</label>
                <input type="checkbox" name="done" <?= (isset($data_form['status']) && $data_form['status'] > 0) ? 'checked' : '' ?>>
            <?php } ?>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Сохранить" class="btn btn-success">
            <a href="index.php?params<?= $url_params ?>" class="btn btn-primary">Вернуться обратно</a>
        </div>
        
    </form>
    
</div>
