<div class="form-group">
    <a href="index.php?form=create_task&current_page=<?= $current_page ?><?= $url_order ?>" class="btn btn-success">Создать новую задачу</a>
</div>

<div id="table-tasks">
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th class="text-center"><a href="index.php?order=1&order_name=<?= $order_name ?>&current_page=<?= $current_page ?>">Имя <?= $order_name_icon ?></a></th>
                <th class="text-center"><a href="index.php?order=1order_email=<?= $order_email ?>&current_page=<?= $current_page ?>">Email <?= $order_email_icon ?></a></th>
                <th class="text-center">Текст задачи</th>
                <th class="text-center"><a href="index.php?order=1order_status=<?= $order_status ?>&current_page=<?= $current_page ?>">Статус <?= $order_status_icon ?></a></th>
                <?php if($admin) { ?>
                    <th></th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
        <?php if(!$result['error']) { ?>
            <?php foreach ($data_form as $item) { ?>
                <tr>
                    <td><?= $item['name']; ?></td>
                    <td><?= $item['email']; ?></td>
                    <td><?= $item['task']; ?></td>
                    <?php if($item['status'] == 0) { ?>
                        <td class="text-center text-danger">Не выполнено</td>
                    <?php } else { ?>
                        <td class="text-center text-success">Выполнено</td>
                    <?php } ?>
                    <?php if($admin) { ?>
                        <td class="text-center"><a href="index.php?form=update_task&id=<?= $item['id'] ?>&current_page=<?= $current_page ?><?= $url_order ?>">Редактировать</span></a></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
        
        <tfoot>
        <?php if($result['error']) { ?>
            <tr>
                <td colspan="4" class="text-center text-danger">Ошибка получения данных!</td>
            </tr>
        <?php } else { ?>
            <?php if(count($result['data']) == 0) { ?>
                <tr>
                    <td colspan="4" class="text-center text-danger">Нет данных!</td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tfoot>
    </table>

    <div id="pagination-page">
        <?php if($start_pagination > 1) { ?>
            <span><a class="btn btn-default" href="index.php?current_page=1<?= $url_order ?>">1</a></span>
            <span class="btn" style="cursor: default">...</span>
        <?php } ?>

        <?php for($index = $start_pagination; $index <= $end_pagination; $index++) { ?>
            <?php if($index == $current_page) { ?>
                <span class="btn" style="cursor: default"><?= $index ?></span>
            <?php } else { ?>
                <span><a class="btn btn-default" href="index.php?current_page=<?= $index ?><?= $url_order ?>"><?= $index ?></a></span>
            <?php } ?>
        <?php } ?>
    
        <?php if($end_pagination < $total_page) { ?>
            <span class="btn" style="cursor: default">...</span>
            <span><a class="btn btn-default" href="index.php?current_page=<?= $total_page ?><?= $url_order ?>"><?= $total_page ?></a></span>
        <?php } ?>
    </div>
    
</div>