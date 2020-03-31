<?php
include "config.php";
?>
<div class="row">
  <h2 class="col-xs-12 col-lg-10 col-lg-offset-1">Crie ou participe de uma sessão</h2>
      
  <!-- Create session panel -->
  <div class="col-xs-12 col-sm-6 col-lg-5 col-lg-offset-1" ng-controller="CreateController as create">
    <div class="panel panel-default">
      <div class="panel-heading">Criar sessão</div>
      <div class="panel-body">  
        <form role="form">
          <div class="form-group" ng-class="{'has-error': create.nameError}">
            <label for="sessionName">Nome da sessão:</label>
            <div class="has-feedback">
              <input type="text" class="form-control" ng-model="create.name" placeholder="Minha sessão">
              <span ng-if="create.nameError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <div class="form-group">
            <label>Cartas: </label>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                <span ng-bind-html="create.selectedSet.value"></span>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li ng-repeat="set in create.cardSets" ng-class="{'active': set == create.selectedSet}">
                  <a class="selectable" ng-click="create.selectedSet = set" ng-bind-html="set.value"></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="form-group">
            <label><input type="checkbox" ng-model="create.isPrivate"> é privado</label> 
          </div>
          <div class="form-group" ng-if="create.isPrivate" ng-class="{'has-error': create.pwdError}">
            <label for="password">Senha:</label>
            <div class="has-feedback">
              <input type="password" class="form-control" ng-model="create.password">
              <span ng-if="create.pwdError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <input type="button" class="btn btn-default" value="Criar" ng-click="create.createSession()">
        </form>
      </div>
    </div>        
  </div>
            
  <!-- Join session panel -->
  <div class="col-xs-12 col-sm-6 col-lg-5" ng-controller="JoinController as join">
    <div class="panel panel-default">
      <div class="panel-heading">Participar da sessão</div>
      <div class="panel-body">
        <form role="form">
          <div class="form-group" ng-class="{'has-error': join.idError}">
            <label>Identificação de sessão:</label>
            <div class="has-feedback">
              <input type="text" class="form-control" ng-model="join.id" ng-change="join.passwordCheck()" placeholder="4711">
              <span ng-if="join.idError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <div class="form-group" ng-class="{'has-error': join.nameError}">
            <label>Seu nome:</label>
            <div class="has-feedback" ng-init="join.name = '<?= isset($_COOKIE['scrum_member_name']) ? $_COOKIE['scrum_member_name'] : "" ?>'">
              <input type="text" class="form-control"  ng-model="join.name" placeholder="John">
              <span ng-if="join.nameError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <div class="form-group" ng-if="join.requiresPassword">
            <label>Senha:</label>
            <div class="has-feedback">
              <input type="password" class="form-control"  ng-model="join.password">
              <span ng-if="join.passwordError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <input type="button" class="btn btn-default" value="Entrar" ng-click="join.joinSession()">
       </form>
      </div>
    </div>        
  </div>
  
</div>
