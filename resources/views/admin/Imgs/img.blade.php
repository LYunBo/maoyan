<style>
	ul{list-style:none;}
	li{float:left;margin-left:10px;margin-top:10px;}
</style>
<div class="portfolio-content">
		<ul class="cl portfolio-area">
			@foreach($imgs as $img)
			<li class="item hover">
				<div class="portfoliobox">
					<div class="picbox"><img src="{{$img}}" width="150" height="150"></div>
				</div>
			</li>
			@endforeach
		</ul>
</div>