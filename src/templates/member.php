<?php 
include __DIR__ . "/../config.php";

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <a ng-href="{{member.topicUrl}}" target="_blank"><h2 class="col-xs-10" ng-bind="member.topic"></h2></a>
      <div class="col-xs-2">
        <div class="leave remove selectable" ng-click="member.leave()">
          <span class="glyphicon glyphicon-remove"></span>
        </div>
      </div>
    </div>
  </div>
  <div class="panel-body" style="white-space: pre-line">
    <div ng-bind-html="member.description"></div>
  </div>
</div>

<div class="row">
  <div class="col-lg-2 col-md-3 col-xs-4" ng-repeat="card in member.cards">
    <div class="card-container">
      <div class="card selectable" ng-class="{active: card.active, confirmed: card.confirmed}" ng-click="member.selectCard(card)">
        <div class="inner">
          <span class="card-label" ng-bind-html="card.value"></span>
	      </div>
      </div>
    </div>
  </div>
</div>
