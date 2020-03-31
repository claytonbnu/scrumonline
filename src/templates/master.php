<?php
include __DIR__ . "/../config.php";

?>
<!-- Headline -->
<div class="row">
  <div class="col-xs-12 col-sm-1">
    <button class="btn btn-lg btn-danger wipe" ng-click="master.wipe()">Apagar</button>
  </div>
  <div class="col-xs-10 col-sm-8 col-md-10">
    <h1>{{ master.id }} - {{ master.name }}</h1>
  </div>
  <div class="hidden-xs col-sm-2 col-md-1">
    <h1>{{ master.stopwatchElapsed }}</h1>
  </div>
</div>
      
<!-- Poll control -->
<div class="row topic">
  <div class="col-xs-12">
<!--    <ul class="nav nav-tabs">
      <li ng-class="{active: master.current == source}" ng-repeat="source in master.sources| orderBy: 'position'">
        <a class="selectable" ng-click="master.selectSource(source)">{{ source.name }}</a>
      </li>
    </ul>-->
    <div class="ticketing" ng-include="master.current.view">
    </div>
  </div>
</div>
  
<!-- Live poll view and statistics -->
<div class="row" ng-if="master.teamComplete">
  <div class="card-overview">
    <div ng-repeat="vote in master.votes track by vote.id">        
      <div class="card-container">
        <div class="deletable-card">
          <div class="card-flip" ng-class="{flipped: master.flipped}">
            <div class="card front" ng-class="{active: vote.active}">
              <div ng-if="vote.placed" class="inner"><span class="card-label">?</span></div>
            </div>
            <div class="card back" ng-class="{active: vote.active, confirmed: master.consensus}">
              <div class="inner"><span class="card-label" ng-bind-html="vote.value"></span></div>
            </div>
          </div>
          <div ng-if="vote.canDelete" class="delete-member remove selectable" ng-click="master.remove(vote.id)">
            <span class="glyphicon glyphicon-remove"></span>
          </div>
        </div>
        <h2 ng-bind="vote.name"></h2>
      </div>            
    </div>
  </div> 
</div>           
            
<!-- Invite and statistics -->            
<div class="row">
  <div class="hidden-xs hidden-sm col-md-5">
    <h2>Convidar membros</h2>
    <p>Convide membros para participar de sua sessão. Identificação de sessão: <strong ng-bind="master.id"></strong></p>
<?php
$joinUrl = $host . "/join/";
?>
    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= urlencode($joinUrl) . "{{ master.joinFragment }}" ?>&choe=UTF-8" title="Entrar {{ master.id }}" />
<?php
$joinUrl = $joinUrl . "{{ master.joinFragment }}";
?>
    <p>Ou envie a eles este link: <a href="<?= $joinUrl ?>"><?= $joinUrl ?></a>
  </div>

  <!-- Team list and complete button -->
  <div class="col-xs-12 col-md-5" ng-if="!master.teamComplete">
    <h2>Equipe</h2>
    <ul class="list-group">
      <!-- Iterate over votes as they represent members as well -->
      <li class="list-group-item" ng-repeat="member in master.votes track by member.id">{{$index + 1}}. {{member.name}}</li>
    </ul>
    <button class="btn btn-success" ng-click="master.teamComplete = true">Equipe concluída</button>
  </div>   
    
  
</div>
