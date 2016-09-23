<script type='text/javascript'>
    $(function () {
        $("a.reply").click(function () {
            var id = $(this).attr("id");
            $("#parent_id").attr("value", id);
            $("#name").focus();
        });
    });
</script>

<style type='text/css'>


    a, a:visited {
        outline: none;
        color: #7d5f1e;
    }

    .clear {
        clear: both;
    }

    #wrapper {
        width: 480px;
        margin: 0 auto 0 4px;
        padding: 15px 0px;
    }

    .comment_box {
        padding: 5px;
        border: 2px solid #7d5f1e;
        margin-top: 15px;
        list-style: none;
    }

    .aut {
        font-weight: bold;
    }

    .timestamp {
        font-size: 85%;
        float: right;
    }


    #comment_body {
        display: block;
        width: 100%;
        height: 150px;
    }


</style>
        <div class="container">

            <div class="starter-template">
                <h1><?= $news->ne_title ?></h1>
                <p class="lead"><?= $news->ne_desc ?></p>
                <p><img src="<?php echo base_url(); ?>global/uploads/<?= $news->ne_img ?>"/></p>
                <p>     </p>
            </div>
            <div class="contact-form">
                <?php echo $comments ?>
                <h3 class="comment-reply-title">
                    Leave a Reply
                </h3>

                <p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>

                <form id="comment_form" action="<?= base_url() ?>news/add_comment/<?= $news->ne_id ?>" method='post'>
                    <div class="form-group">
                        <label for="comment_name">Name:</label>
                        <input class="form-control" type="text" required name="comment_name" id='name' value="<?= set_value("comment_name") ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail :</label>
                        <input class="form-control" type="text" name="comment_email" value="<?= set_value("comment_email") ?>" id='email'/>
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment :</label>
                        <textarea class="form-control" name="comment_body" value="<?= set_value("comment_body") ?>" id='comment'></textarea>
                    </div>

                    <input type='hidden' name='parent_id' value="0" id='parent_id' />
                    <input type='hidden' name='ne_id' value="<?= set_value("ne_id", $news->ne_id) ?>" id='parent_id'/>

                    <div id='submit_button'>
                        <input class="btn btn-success" type="submit" name="submit" value="add comment"/>
                    </div>
                </form>
            </div>
        </div><!-- /.container -->



