@extends('home.Public.Public')
@section('home')
<link rel="stylesheet" href="/static/home/information/css/common.4b838ec3.css"/>
<link rel="stylesheet" href="/static/home/information/css/profile-profile.13d06bf4.css"/>
<script crossorigin="anonymous" src="/static/home/information/js/stat.74891044.js"></script>
<script>if(window.devicePixelRatio >= 2) { document.write('<link rel="stylesheet" href="/static/home/information/css/image-2x.8ba7074d.css"/>') }</script>
<div class="header-placeholder">
</div>
<div class="container" id="app" class="page-profile/profile">
  <div class="content">
    <div class="main" style="width:1170px">
      <div class="info-content clearfix">
        <div class="user-profile-nav">
          <h1>个人中心</h1>
          <a href="/myorder" class="orders ">我的订单</a>
          <a href="/information" class="profile active">基本信息</a>
        </div>
        <div class="profile-container">
          <div class="profile-title">
          基本信息
          </div>
          <div class="avatar-container">
            <div class="avatar-content">
              <img class="J-setted-avatar" src="{{$list->photo or '/static/home/information/image/675d3a8bbe27febcf1ccd8c2a25d891210399.png'}}">
              <form action="/changephoto" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="J-upload-avatar-w upload-avatar-image">
                  <input type="file" class="J-upload-avatar upload-btn" name="photo">
                  <input type="submit" class="J-upload-avatar upload-btn" value="更换头像">
                </div>
              </form>
              <div class="tips">
                支持JPG,JPEG,PNG格式,且文件需小于1M
              </div>
            </div>
          </div>
          <form id="J-userexinfo-form" class="userexinfo-form" method="post" action="chinformation">
            {{csrf_field()}}
            <div class="userexinfo-form-section">
              <p>
                昵称：
              </p>
              <span>
              <input type="text" name="user_name" id="userexinfo-form-nickname" class="ui-checkbox" placeholder="2-15个字，支持中英文、数字" value="{{$list->user_name or '未填'}}">
              </span>
            </div>
            <div class="userexinfo-form-section">
              <p>
                性别：
              </p>
              <span>
              <input type="radio" name="sex" id="userexinfo-form-gender-1" value="0" class="ui-radio radio-first" {{$list->sex == 1 ? 'checked' : ''}}>
              <label for="userexinfo-form-gender-1">男</label>
              </span>
              <span>
              <input type="radio" name="sex" id="userexinfo-form-gender-2" value="1" class="ui-radio" {{$list->sex == 0 ? 'checked' : ''}}>
              <label for="userexinfo-form-gender-2">女</label>
              </span>
            </div>
            <div class="date-picker userexinfo-form-section">
              <p>
                生日：
              </p>
              <span>
              <div class="ui-select">
                <input type="text" name="birthday" id="userexinfo-form-nickname" class="ui-checkbox" placeholder="年/月/日" value="{{$list->birthday or '未填'}}">
              </div>
              </span>
            </div>
            <div class="userexinfo-form-section">
              <p>
                生活状态：
              </p>
              <span>
              @if(!empty($list->lifestate))
                <input type="radio" name="lifestate" id="userexinfo-form-merriage-1" value="单身" class="ui-radio radio-first" {{$list->lifestate == '单身' ? 'checked' : ''}}>
                <label for="userexinfo-form-merriage-1">单身</label>
                </span>
                <span>
                <input type="radio" name="lifestate" id="userexinfo-form-merriage-2" value="热恋中" class="ui-radio" {{$list->lifestate == '热恋中' ? 'checked' : ''}}>
                <label for="userexinfo-form-merriage-2">热恋中</label>
                </span>
                <span>
                <input type="radio" name="lifestate" id="userexinfo-form-merriage-3" value="已婚" class="ui-radio" {{$list->lifestate == '已婚' ? 'checked' : ''}}>
                <label for="userexinfo-form-merriage-3">已婚</label>
                </span>
                <span>
                <input type="radio" name="lifestate" id="userexinfo-form-merriage-4" value="为人父母" class="ui-radio" {{$list->lifestate == '为人父母' ? 'checked' : ''}}>
                <label for="userexinfo-form-merriage-4">为人父母</label>
              @else
                <input type="radio" name="lifestate" id="userexinfo-form-merriage-1" value="单身" class="ui-radio radio-first">
                <label for="userexinfo-form-merriage-1">单身</label>
                </span>
                <span>
                <input type="radio" name="lifestate" id="userexinfo-form-merriage-2" value="热恋中" class="ui-radio">
                <label for="userexinfo-form-merriage-2">热恋中</label>
                </span>
                <span>
                <input type="radio" name="lifestate" id="userexinfo-form-merriage-3" value="已婚" class="ui-radio">
                <label for="userexinfo-form-merriage-3">已婚</label>
                </span>
                <span>
                <input type="radio" name="lifestate" id="userexinfo-form-merriage-4" value="为人父母" class="ui-radio">
                <label for="userexinfo-form-merriage-4">为人父母</label>
              @endif
              </span>
            </div>
            <div class="userexinfo-form-section">
              <p>
                从事行业：
              </p>
              <span>
              <input type="text" name="job" id="userexinfo-form-bio" class="ui-checkbox" placeholder="20个字以内" value="{{$list->job or '未填'}}">
              </span>
            </div>
            <div class="userexinfo-form-section expand-list">
              <p>
                兴趣：
              </p>
              <div class="interest-list">
                <input type="text" name="hobby" id="userexinfo-form-bio" class="ui-checkbox" placeholder="20个字以内" value="{{$list->hobby or '未填'}}">
                <span class="bottom-tips">选择你的兴趣使你获得个性化的电影推荐哦</span>
              </div>
            </div>
            <div class="userexinfo-form-section">
              <p>
                个性签名：
              </p>
              <span>
              <input type="text" name="autograph" id="userexinfo-form-bio" class="ui-checkbox" placeholder="20个字以内" value="{{$list->autograph or '未填'}}">
              </span>
            </div>
            <input type="hidden" name="csrf" value="af178c731da0c05c2029821276067a4c9b8f091cf228d17ef082d5f90344f393">
            <div class="userexinfo-bottom-section clearfix">
              <input type="submit" class="form-save-btn" value="保存">
              <!-- <span id="cancell-btn" class="cancel_alert hand">注销账号1</span> -->
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="body-mask">
    </div>
    <div id="img-cropper" class="img-cropper">
      <div class="img-cropper-container">
        <div class="img-cropper-header">
        上传头像
          <span class="close-icon"></span>
        </div>
        <div class="img-cropper-content">
          <div class="img-main">
            <div class="img-main-wrapper">
              <img src="./static/home/information/image/675d3a8bbe27febcf1ccd8c2a25d891210399.png">
            </div>
          </div>
          <div class="img-preview">
            <p>
              预览
            </p>
            <div class="img-preview-block">
            </div>
          </div>
        </div>
        <div class="img-cropper-footer">
          <div class="img-btn-confirm">
          确认
          </div>
          <div class="img-btn-cancel">
          取消
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mask3">
    <div class="modal-container" style="display:none">
      <div class="modal">
        <span class="icon"></span>
        <p class="tip">
          您确定要删除该订单嘛？删除后，不可恢复～
        </p>
        <div class="short btn ok-btn">
          确定
        </div>
        <div class="short btn cancel-btn">
          取消
        </div>
      </div>
    </div>
  </div>
  <div class='mask1'>
    <div class="modal-container" style="display:none">
      <div class="modal">
        <span class="icon"></span>
        <p class="tip">
          请注意，注销账号会清空所有订单信息、影评、积分、<br>
          账户余额等信息且无法找回，是否继续？
        </p>
        <div class="short btn ok-btn">
          确定
        </div>
        <div class="short btn cancel-btn">
          取消
        </div>
      </div>
    </div>
  </div>
  <div class='mask2'>
    <div class="modal-container" style="display:none">
      <div class="modal">
        <span class="icon"></span>
        <p class="tip">
          请联系客服10105335
        </p>
        <div class="ok-btn btn">
          我知道了
        </div>
      </div>
    </div>
  </div>
</div>
@endsection