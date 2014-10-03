<?php
/**
 * The main page.
 *
 * Basic page.
 *
 * @package WordPress
 * @subpackage Kickstartcupen
 * @since Kickstartcupen 1.0
 * Template Name: kscVoteBasic
 */
get_header();
?>
      <div id="page" class="page-wrapper" ng-controller="PageCtrl">
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
          <?php
            $rules_button = get_field('rules_button');
            $rules_header = get_field('rules_header');
            $rules = get_field('rules');
            $scheme_header = get_field('scheme_header');
          ?>
          <div class="container">
            <div class="page-header text-center">
              <h2><?php the_title(); ?></h2>
            </div>
            <div class="page-intro">
              <div class="row">
                <div class="col-sm-12">
                  <div class="page-text">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="page-time-left text-center">
              <h5>Tid kvar att rösta: <timer end-time="1413417601000">{{(days*24)+hours}}:{{mminutes}}:{{sseconds}}</timer></h5>
            </div>
            <div id="rules" class="page-rules-search">
              <div class="row">
                <div class="col-sm-12 visible-xs">
                  <input class="form-control search search-xs" ng-model="search.user.username" placeholder="Sök">
                </div>
              </div>
              <div class="row">
                <div id="search" class="col-sm-6">
                  <button class="btn btn-ksc-blu btn-block" ng-click="rulesCollapsed = !rulesCollapsed"><?php echo $rules_button; ?></button>
                </div>
                <div class="col-sm-6 hidden-xs">
                  <input class="form-control search" ng-model="search.user.username" placeholder="Sök">
                </div>
              </div>
            </div>
            <div class="page-rules-show">
              <div class="row">
                <div class="col-sm-12">
                  <div collapse="!rulesCollapsed">
                    <div class="row">
                      <div class="col-sm-6">
                        <h5><?php echo $rules_header; ?></h5>
                        <p>
                          <?php echo $rules; ?>
                        </p>
                      </div>
                      <div class="col-sm-6">
                        <img class="img-responsive center-block" src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-scheme-v.2.0.png" alt="" />
                      </div>
                    </div>
                    <div>
                      <h5 class="sheme-header"> <?php echo $scheme_header; ?> </h5>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 scheme-date-pad">
                        <div class="row">
                          <div class="col-sm-3">
                            <p>
                              30/9-12/10
                            </p>
                          </div>
                          <div class="col-sm-9">
                            Tävlingen öppen för nya bidrag.
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6 scheme-date-pad">
                        <div class="row">
                          <div class="col-sm-3">
                            <p>
                              20 okt
                            </p>
                          </div>
                          <div class="col-sm-9">
                            Kvartsfinal. Röstningen öppen i 24h.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 scheme-date-pad">
                        <div class="row">
                          <div class="col-sm-3">
                            <p>
                              13 okt
                            </p>
                          </div>
                          <div class="col-sm-9">
                            Grundomgången startar. Röstningen öppen i 48h.
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6 scheme-date-pad">
                        <div class="row">
                          <div class="col-sm-3">
                            <p>
                              22 okt
                            </p>
                          </div>
                          <div class="col-sm-9">
                            Semifinal. Röstningen öppen i 24h.
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 scheme-date-pad">
                        <div class="row">
                          <div class="col-sm-3">
                            <p>
                              16 okt
                            </p>
                          </div>
                          <div class="col-sm-9">
                            Åttondelsfinal. Röstningen öppen i 24h.
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6 scheme-date-pad">
                        <div class="row">
                          <div class="col-sm-3">
                            <p>
                              24 okt
                            </p>
                          </div>
                          <div class="col-sm-9">
                            FINAL! Röstningen öppen i 24h.
                          </div>
                        </div>
                      </div>
                    </div>
                   </div>
                </div>
              </div>
            </div>
            <div id="tags" class="page-tags" ng-controller="BasicRoundCtrl">
              <div class="row">
                <div class="col-sm-3" ng-repeat="item in items | filter:search | limitTo:startNum">
                  <div class="ig-item">
                    <img class="img-responsive" ng-src="{{item.custom_fields.photo_url[0]}}" alt="" ng-click="showItem(item.link)" />
                    <h6 ng-click="isCollapsed = !isCollapsed">@{{item.title}}</h6>
                    <div class="ig-item-caption" collapse="!isCollapsed">
                      <p>
                        {{item.custom_fields.instagram_caption[0]}}
                      </p>
                      <div class="item-share">
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/images/ksc-ig-view.png" alt="" />
                      </div>
                    </div>
                    <div class="vote-heart" ng-click="vote(item.id,$index)">
                      <span>{{item.custom_fields.votes[0]}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 ig-spinner text-center">
                  <a class="btn btn-ksc-blu btn-more" ng-click="nextTwelve()" ng-show="loaded && smaller">Ladda fler
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; ?>
      </div>
<?php
get_footer();
?>
