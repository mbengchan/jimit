<div class="post_section">
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-sm-8 post_left">
                        <div class="post_left_section post_left_border">
                            <div class="post single_post">
                                <div class="post_thumb">
                                    <img src="<?=$article->getPicture()?>" alt="<?=strip_tags($article->title)?>" />
                                </div><!--end post thumb-->
                                <div class="meta">
                                    <span class="author">Par: <a href="#"><?=strip_tags($article->posted_by)?></a></span>
                                    <span class="category"> <a href="#"><?=strip_tags($article->category->name)?></a></span>
                                    <span class="date">Publié: <a href="#"><?=date('F', $article->datetime)?> <?=date('d', $article->datetime)?>, <?=date('Y', $article->datetime)?></a></span>
                                </div><!--end meta-->
                                <h1><?=strip_tags($article->title)?></h1>
                                <div class="post_desc">
                                    <?=$article->content?>
                                </div><!--end post desc-->
                                <!--<div class="post_bottom">
                                    <ul>
                                        <li class="like">
                                            <a href="#">
                                                <img src="img/news/like_icon.png" alt="" />
                                                <span>12</span>
                                            </a>
                                        </li>
                                        <li class="share">
                                            <a href="#">
                                                <img src="img/news/share_icon.png" alt="" />
                                                <span>12</span>
                                            </a>
                                        </li>
                                        <li class="favorite">
                                            <a href="#">
                                                <img src="img/news/favorite_icon.png" alt="" />
                                                <span>12</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>--><!--end post bottom-->
                            </div><!--end post-->
                            <div class="related_post_sec single_post">
                                <h3>Related Posts</h3>
                                <?php if (count($cats) == 0) :?>
                                <div class="alert alert-info" role="alert">
                                    <strong>La tête haute!</strong> Aucun poste lié.
                                </div>
                            <?php endif;?>
                                <ul>
                                <?php foreach ($cats as $key) :?>
                                    <li>
                                        <span class="rel_thumb">
                                            <a href="<?=URL::site('fr/articles/article'.'/'.$key->id.'/'.URL::title($key->title, '_'))?>"><img src="<?=$key->getPicture()?>" alt="<?=$key->title?>"></a>
                                        </span><!--end rel_thumb-->
                                        <div class="rel_right">
                                            <h4><a href="<?=URL::site('fr/articles/article'.'/'.$key->id.'/'.URL::title($key->title, '_'))?>"><?=strip_tags($key->title)?></a></h4>
                                            <div class="meta">
                                                <span class="author">By: <a href="<?=URL::site('fr/articles/article'.'/'.$key->id.'/'.URL::title($key->title, '_'))?>"><?=strip_tags($key->posted_by)?></a></span>
                                                <span class="category"> <a href="<?=URL::site('fr/articles/article'.'/'.$key->id.'/'.URL::title($key->title, '_'))?>"><?=strip_tags($key->category->name)?></a></span>
                                                <span class="date">Posted: <a href="<?=URL::site('fr/articles/article'.'/'.$key->id.'/'.URL::title($key->title, '_'))?>"><?=date('F', $key->datetime)?> <?=date('d', $key->datetime)?>, <?=date('Y', $key->datetime)?></a></span>
                                            </div>
                                            <p>
                                                <?=Text::limit_words(strip_tags($article->content), 30)?>
                                            </p>
                                        </div><!--end rel right-->
                                    </li>
                                <?php endforeach;?>
                                </ul>
                            </div><!--end single_post-->
                            <div class="comments_section">
                                <div class="comment_post">
                                    <h3>commentaires</h3>
                                    <div class="comment_header">
                                        <ul>
                                            <li class="comment_count"><?=$count?> comment</li>
                                            <!--<li class="comment_favorite_count"><i class="fa fa-star"></i> <span>0</span></li>-->
                                        </ul>
                                    </div><!--end comment header-->
                                        <div id="post_list">
                                        <?php $comments = $article->comments->find_all();
                                         foreach ($comments as $comment) :?>
                                            <div class="post-content" data-role="post-content">
                                                <div class="avatar">
                                                    <span class="user">
                                                    <img alt="Avatar" src="<?=URL::base()?>media/img/news/avatar.png" />
                                                    </span>
                                                </div>
                                                <div class="post-body">
                                                    <div class="post-top">
                                                        <span class="post-byline">
                                                            <span class="author publisher-anchor-color"><a href="#"><?=$comment->name?></a></span>
                                                        </span>
                                                        <span class="post-meta">
                                                            <a  href="#"><?=Date::fuzzy_span($comment->datetime)?></a>
                                                        </span>
                                                    </div><!--end post-top-->
                                                    <div class="post-body-inner">
                                                        <div  class="post-message">
                                                            <p>
                                                                <?=strip_tags($comment->comment)?>
                                                            </p>
                                                        </div>
                                                    </div><!--end post-body-inner-->
                                                </div><!--end post-body-->
                                            </div><!--end post-content-->
                                            <br />
                                        <?php endforeach;?>
                                        </div><!--end post_list-->
                                        <hr />
                                    <!--<div class="comment_bottom_block">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-rss"></i> &nbsp; Comment feed</a></li>
                                            <li><a href="#"><i class="fa fa-envelope-o"></i> &nbsp; Subscribe via email</a></li>
                                        </ul>
                                    </div>--><!--end comment_bottom_block-->
                                </div><!--end comment post-->
                                <div class="comments_form">
                                    <h3>Poste un commentaire</h3>
                                    <form method="post">
                                    <?php if (!empty(@$errors)) :?>
                                    <div class="alert alert-warning" role="alert">
                                        <strong>Attention!</strong> Certaines erreurs ont été rencontrées. Fixez-les à continuer.
                                    </div>
                                  <?php endif;?>
                                    <div class="half">
                                      <input type="text" id="name" name="name" class="form-control" placeholder="Nom">
                                      <label for="name"><?=Arr::get(@$errors, 'name')?></label>
                                    </div>
                                    <div class="half right">
                                      <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                                      <label for="email"><?=Arr::get(@$errors, 'name')?></label>
                                    </div>
                                    <div class="full">
                                      <textarea rows="9" id="comment" cols="10" name="comment" class="form-control" placeholder="Écrire un commentaire"></textarea>
                                      <label for="comment"><?=Arr::get(@$errors, 'name')?></label>
                                    </div>
                                    <input type="submit" class="commonBtn" value="Soumettre">
                                  </form>
                                </div><!--end comments form-->
                            </div><!--end comments section-->
                        </div><!--end post left section-->
                    </div><!--end post_left-->
                    
                    <div class="col-xs-12 col-sm-4 post_right">
                        <div class="related_post_sec">
            
                            <div class="list_block">
                                <h3>Dernières nouvelles</h3>
                                <ul>
                                    <li>
                                    <?php if (count($articles) == 0) :?>
                                      <div class="alert alert-info" role="alert">
                                        <strong>La tête haute!</strong> Pas le dernier article à afficher.
                                      </div>
                                    <?php endif;?>
                                    </li>
                                <?php foreach ($articles as $article) :?>
                                    <li>
                                        <span class="rel_thumb">
                                            <img src="<?=@$article->getPicture()?>" style="width:100px; height:67px" alt="<?=strip_tags($article->title)?>" />
                                        </span><!--end rel_thumb-->
                                        <div class="rel_right">
                                            <a href="<?=URL::site('fr/articles/article'.'/'.$article->id.'/'.URL::title($article->title, '_'))?>"><h4><?=strip_tags($article->title)?></h4></a>
                                            <span class="date">Posted: <a href="<?=URL::site('fr/articles/article'.'/'.$article->id.'/'.URL::title($article->title, '_'))?>"><?=date('F', $article->datetime)?> <?=date('d', $article->datetime)?>, <?=date('Y', $article->datetime)?></a></span>
                                        </div><!--end rel right-->
                                    </li>
                                <?php endforeach;?>
                                </ul>
                                <a href="<?=URL::site('fr/articles')?>" class="more_post">Plus</a>
                            </div><!-- end list_block -->

                            <div class="list_block">
                                <div class="upcoming_events">
                                    <h3>évènements à venir</h3>
                                    <ul>
                                        <li>
                                        <?php if (count($events) == 0) :?>
                                          <div class="alert alert-info" role="alert">
                                            <strong>La tête haute!</strong> Pas de dernier événement à afficher.
                                          </div>
                                        <?php endif;?>
                                        </li>
                                        <?php foreach ($events as $event) :
                                            $timestamp = strtotime($event->date);
                                          ?>
                                          <li class="related_post_sec single_post">
                                            <span class="date-wrapper">
                                              <span class="date"><span><?=strip_tags(date('d', @$timestamp))?></span><?=strip_tags(date('M', $timestamp))?></span>
                                            </span>
                                            <div class="rel_right">
                                              <h4><a href="<?=URL::site('fr/events/event/'.'/'.$event->id.'/'.URL::title($event->title, '_'))?>"><?=strip_tags($event->title)?></a></h4>
                                              <div class="meta">
                                                <span class="place"><i class="fa fa-map-marker"></i><?=@strip_tags(@$event->location)?></span>
                                                <span class="event-time"><i class="fa fa-clock-o"></i><?=strip_tags(@$event->time)?></span>
                                              </div>
                                            </div>
                                          </li>
                                      <?php endforeach; ?>
                                    </ul>
                                    <a href="<?=URL::site('fr/events')?>" class="btn btn-default btn-block commonBtn">Plus d'événements</a>
                                </div>
                            </div><!-- end list_block -->
                            <div class="list_block">
                                <h3>Facebook</h3>
                                <div class="facebook_section">
                                    <img src="<?=URL::base()?>media/img/news/facebook.png" alt="" />
                                </div><!--end facebook section-->
                            </div><!-- end list_block -->
                            <div class="list_block">
                                <h3>Twitter</h3>
                                <div class="twitter_section">
                                    <img src="<?=URL::base()?>media/img/news/twitter.png" alt="" />
                                </div><!--end facebook section-->
                            </div><!-- end list_block -->
                            <div class="list_block">
                                <div class="newsletter">
                                    <h3>Bulletin</h3>
                                    <form action="#" method="post">
                                        <div class="form-group">
                                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                        </div>
                                        <button type="submit" class="btn btn-default btn-block commonBtn">Souscrire</button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end list_block -->
                        </div><!--end related_post_sec-->
                    </div><!--end post_right-->
                </div>
            </div>
        </div><!--end post section-->   