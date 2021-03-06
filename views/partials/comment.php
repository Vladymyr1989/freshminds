<? use yii\widgets\LinkPager;
use yii\helpers\Html;
    ;?>
<!--related post carousel-->
<? if (!empty($comments)): ?>
    <div class="bottom-comment">
            <h4><?= $article->countArticleComments() ?> comments</h4>
    </div>
    <? foreach ($comments as $comment): ?>
        <!--bottom comment-->
        <div class="bottom-comment">
            <div class="comment-img">
<!--                <img class="img-circle" src="--><?//= $comment->user->image; ?><!--" alt="">-->
                <img class="img-circle" src="<?= $comment->user->getImage(); ?>" alt="">
            </div>
            <div class="comment-text">
<!--                <a href="#" class="replay btn pull-right"> Replay</a>-->
                <h5><?= $comment->user->name; ?></h5>
                <p class="comment-date"><?= $comment->getDate(); ?></p>
                <p class="para"><?= str_replace("\n","<br>",$comment->text); ?></p>
            </div>
        </div>
    <? endforeach; ?>
    <?else:?>
    <div class="bottom-comment">
        <h4>No comments for now</h4>
    </div>
        <!-- end bottom comment-->
<? endif; ?>
<?= LinkPager::widget([
    'pagination' => $pagination,
]); ?>
<div class="leave-comment"><!--leave comment-->
    <? if (!Yii::$app->user->isGuest):?>
    <h4>Leave a reply</h4>

    <? app\assets\PublicAsset::register($this);
    $form = \yii\widgets\ActiveForm::begin([
        'action'=>['site/comment', 'id'=>$article->id],
        'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Write Message'])->label(false)?>
        </div>
    </div>
    <?= Html::submitButton('Post Comment', ['class' => 'btn send-btn']) ?>
    <? \yii\widgets\ActiveForm::end();?>
    <? else:?>
        <h5>Register to leave a comment</h5>
    <? endif;?>
</div>
<!--end leave comment-->