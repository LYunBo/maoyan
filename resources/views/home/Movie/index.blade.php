@extends('home.Public.Public')
@section('home')
<script src="/static/jquery-1.8.3.min.js"></script>

<div class="header-placeholder">
</div>
<div class="banner">
  <div class="wrapper clearfix">
    <div class="celeInfo-left">
      <div class="avatar-shadow">
        <img class="avatar" src="{{$data->cover}}" alt="">
        <div class="movie-ver">
        </div>
      </div>
    </div>
    <div class="celeInfo-right clearfix">
      <div class="movie-brief-container">
        <h3 class="name">{{$data->name}}</h3>
        <div class="ename ellipsis">
          
        </div>
        <ul>
        
          <li class="ellipsis">{{$for}}</li>
          <li class="ellipsis">
        中国大陆
          / {{$data->times}}分钟
          </li>
          <li class="ellipsis">{{$data->ymd}}大陆上映</li>
        </ul>
      </div>
      <div class="action-buyBtn">
        <div class="action clearfix" data-val="{movieid:1238696}">
          <a class="wish " data-wish="false" data-score="" data-bid="b_gbxqtw6x" style="height: 35px">
          <div>
            <i class="icon wish-icon"></i>
            <span class="wish-msg" data-act="wish-click">想看</span>
          </div>
          </a>
          <a class="score-btn " data-bid="b_rxxpcgwd" style="height: 35px">
          <div>
            <i class="icon score-btn-icon"></i>
            <span class="score-btn-msg" data-act="comment-open-click">
                评分
            </span>
          </div>
          </a>
        </div>
        <a class="btn buy" href="/films_show_cinema?id={{$data->id}}" target="_blank">特惠购票</a>
      </div>
      <div class="movie-stats-container">
        <div class="movie-index">
          <p class="movie-index-title">
            用户评分
          </p>
          <div class="movie-index-content score normal-score">
            <span class="index-left info-num ">
            <span class="stonefont">{{$data->score}}</span>
            </span>
            <div class="index-right">
              <div class='star-wrapper'>
                <div class="star-on" style="width:91%;">
                </div>
              </div>
              <span class='score-num'><span class="stonefont">{{$data->box_office+753}}</span>人评分</span>
            </div>
          </div>
        </div>
        <div class="movie-index">
          <p class="movie-index-title">
            累计票房
          </p>
          <div class="movie-index-content box">
            <span class="stonefont">{{$data->box_office}}</span><span class="unit">万</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container" id="app" class="page-movie/detail">
  <div class="main-content-container clearfix">
    <div class="main-content">
      <div class="tab-container">
        <div class="tab-title-container clearfix">
          <div class="tab-title active" onclick="fun(this)" data-act="tab-desc" id="cz">
            介绍
          </div>
          <div class="tab-title " onclick="fun(this)" data-act="tab-celebrity">
            演职人员
          </div>
          
          <div class="tab-title " onclick="fun(this)" data-act="tab-img">
            图集
          </div>
        </div>


        <div class="tab-content-container">
          <!-- 介绍 -->
          <div class="tab-desc tab-content active" data-val="{tabtype:'desc'}">
            <div class="module">
              <div class="mod-title">
                <h3>剧情简介</h3>
              </div>
              <div class="mod-content">
                <span class="dra">{{$data->film_introduce}}生活。</span>
              </div>
            </div>
            <div class="module">
              <div class="mod-title">
                <h3>演职人员</h3>
                <a class="more" href="#celebrity" data-act="all-actor-click">全部</a>
              </div>
              <div class="mod-content">
                <div class="celebrity-container clearfix">
                  <div class="celebrity-group">
                    <div class="celebrity-type">
    导演
                    </div>
                    <ul class="celebrity-list clearfix">
                      <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:947678}">
                      <a href="/films/celebrity/947678" target="_blank" class="portrait">
                      <img class="default-img" data-src="{{$data->director_img}}" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/947678" target="_blank" class="name">
      {{$data->director}}
                        </a>
                      </div>
                      </li>
                      
                    </ul>
                  </div>
                  <div class="celebrity-group">
                    <div class="celebrity-type">
    演员
                    </div>
                    <ul class="celebrity-list clearfix">
                    @for($i=0;$i<$count;$i++)
                      <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894923}">
                      <a href="/films/celebrity/2894923" target="_blank" class="portrait">
                      <img class="default-img" data-src="{{$performer[$i]->img}}" alt="">
                      </a>
                      <div class="info">
                        <a href="/films/celebrity/2894923" target="_blank" class="name">
      {{$performer[$i]->name}}
                        </a>
                      </div>
                      </li>
                    @endfor
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="module">
              <div class="mod-title">
                <h3>图集</h3>
                <a class="more" href="#img" data-act="all-photo-click">全部</a>
              </div>
              <div class="mod-content">
                <div class="album clearfix" data-act="movie-img-click">
                @for($i=0;$i<=4;$i++)
                  <div class="img1">
                    <img class="default-img" data-src="{{$filmarr[$i]}}" alt="">
                  </div>
                  @endfor
                  
                </div>
              </div>
            </div>
            <div class="module">
              <div class="mod-title">
                <h3>热门短评</h3>
              </div>
              <div class="mod-content">
                <div class="comment-list-container" data-hot="10">
                  <ul>
                   
                    <li class="comment-container last" data-val="{commentid:1046033674}">
                    <div class="portrait-container">
                      <div class="portrait">
                        <img src="/static/home/picture/c728ce387496d93a94b640e672970d375454.jpg@100w_100h_1e_1c" alt="">
                      </div>
                      <i class="level-4-icon"></i>
                    </div>
                    <div class="main">
                      <div class="main-header clearfix">
                        <div class="user">
                          <span class="name">阳明九州刘立申13955124637</span>
                          <span class='tag'>购</span>
                        </div>
                        <div class="time" title="2018-11-27 22:30:03">
                          <span title="2018-11-27 22:30:03">4天前</span>
                          <ul class="score-star clearfix" data-score="8">
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left active"></i><i class="half-star right active"></i></li>
                            <li>
                            <i class="half-star left "></i><i class="half-star right "></i></li>
                          </ul>
                        </div>
                        <div class="approve " data-id="1046033674">
                          <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">14</span>
                        </div>
                      </div>
                      <div class="comment-content">
                        如果绝的苦，用心看看身边的人；如果觉得累，看看你的同行，同事…世界很大，总有人比你更苦，比你更累，每个人光鲜的一面背后总有你想不到的痛苦，每个人不堪（或者你不耻，不屑）的背面也会有他沉浸之中的理由，凡事都是有利有弊，去做你喜欢做的事去吧，闲暇之余，也去想想你现在从事的工作到底有什么好与坏，可以与你的老板，做的好的同行聊聊，有可能的话甚至可以和你同行老板聊聊，或者这个行业的佼佼者们，在网上的言论…中华民族是一个善良的民族，勤劳的民族
                      </div>
                    </div>
                    </li>
                    
                  </ul>
                </div>
                <a class="comment-entry" data-act="comment-no-content-click" data-toggle="modal" data-target="#pinglun">写短评</a>
              </div>
            </div>
          </div>
      
          <div class="modal fade" id="pinglun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">写评论</h4>
                      </div>
                      <form action="/" method="get">
          
                          <div class="form-group">
                            <label for="name">请留言评论:</label>
                            
                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                          </div>
                          <input type="submit"  value="提交" class="btn btn-success">
                          {{csrf_field()}}
                      </form>
                      <div class="modal-body">在这里添加一些文本</div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                          
                      </div>
                  </div><!-- /.modal-content -->
              </div><!-- /.modal -->
          </div>

          <!-- 演职人员 -->
          <div class="tab-celebrity tab-content" data-val="{tabtype:'celebrity'}">
            <div class="celebrity-container">
              <div class="celebrity-group">
                <div class="celebrity-type">
    导演
                  <span class="num"></span>
                </div>
                <ul class="celebrity-list clearfix">
                  <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:947678}">
                  <a href="/films/celebrity/947678" target="_blank" class="portrait">
                  <img class="default-img" data-src="{{$data->director_img}}" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/947678" target="_blank" class="name">
      {{$data->director}}
                    </a>
                  </div>
                  </li>
                  
                </ul>
              </div>
              <div class="celebrity-group">
                <div class="celebrity-type">
    演员
                  <span class="num">（{{$c}}）</span>
                </div>
                <ul class="celebrity-list clearfix">
                  @for($i=0;$i<$c;$i++)
                  <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:2894923}">
                  <a href="/films/celebrity/2894923" target="_blank" class="portrait">
                  <img class="default-img" data-src="{{$perfor[$i]->img}}" alt="">
                  </a>
                  <div class="info">
                    <a href="/films/celebrity/2894923" target="_blank" class="name">
      {{$perfor[$i]->name}}
                    </a>
                  </div>
                  </li>
                  @endfor
                </ul>
              </div>
              
            </div>
          </div>
          
          <!-- 图集 -->
          <div class="tab-img tab-content" data-val="{tabtype:'img'}">
            <ul class="clearfix">
            @for($i=0;$i<$cc;$i++)
              <li>
              <img class="default-img" data-act="movie-img-click" data-src="{{$filmimg[$i]}}" alt="">
              </li>
              @endfor
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="related">
      
      <div class="module">
        <div class="mod-title">
          <h3>相关电影</h3>
        </div>
        <div class="mod-content">
          <div class="related-movies">
            <dl class="movie-list">
            @foreach($data1 as $row)
              <dd>
              <div class="movie-item">
                <a href="/movie/{{$row->id}}" target="_blank" data-act="movie-click" data-val="{movieid:1238843}">
                <div class="movie-poster">
                  <img class="poster-default" src="/static/home/picture/loading_2.e3d934bf.png"/>
                  <img data-src="{{$row->cover}}"/>
                </div>
                </a>
                <div class="movie-ver">
                </div>
              </div>
              <div class="channel-detail movie-item-title" title="{{$row->name}}">
                <a href="/films/1238843" target="_blank" data-act="movies-click" data-val="{movieId:1238843}">{{$row->name}}</a>
              </div>
              <div class="channel-detail channel-detail-orange">
                <i class="integer">{{$row->score}}</i>
              </div>
              @endforeach

            </dl>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script id="comment-form-container" type="text/template">
  <form id="comment-form" data-val="{movieid:1238696}">
    <div class="score-msg-container ">
        <div class="score"><span class="num"></span>分</div>
        <div class="score-message"></div>
        <div class="no-score">
          请点击星星评分
        </div>
    </div>
    <div class="score-star-contaienr">
      <ul class="score-star clearfix" data-score="">
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
    <li>
<i class="half-star left "></i><i class="half-star right "></i>    </li>
</ul>
    </div>
    <div class="content-container">
      <textarea placeholder="快来说说你的看法吧" name="content" id="" cols="30" rows="10"></textarea>
      <span class="word-count-info"></span>
    </div>
    <input type="hidden" name="score" />
    <input class="btn" type="submit" value="提交" data-act="comment-submit-click" />
  </form>
  <div class="close">×</div>
  </script>
</div>
@endsection
@section('title','')

<script>
window.onload = function(){
  $(".banner").css("display","block");
}
</script>
<script>
// alert("123");
function fun(thiss){
  $(".tab-title").removeClass("active");
  $(thiss).addClass("active");
  var data = $(thiss).attr("data-act");
  $(".tab-content").removeClass("active");
  $("."+data).addClass("active");
}

</script> 