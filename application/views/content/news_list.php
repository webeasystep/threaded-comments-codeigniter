<h2>News Table</h2>
<div class="alert alert-info">
    <strong>Demo Test!</strong>
    You can test Phpword library in this demo with latest version ,just click to download microsoft .docx file</div>
<p></p>
<div class="table-responsive">
<table class="table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Desc</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($news as $n) : ?>
    <tr>
        <td><a href="<?= base_url() ?>news/show_one/<?= $n['ne_id']; ?>"><?= $n['ne_title']; ?></a></td>
        <td><?= $n['ne_desc']; ?></td>
        <td><img src="<?php echo base_url(); ?>global/uploads/<?= $n['ne_img']; ?>"/>
        </td>
    </tr>
    </tbody>
    <?php endforeach ?>
</table>
</div>

