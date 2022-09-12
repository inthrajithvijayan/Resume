<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <title>Document</title>
    <style>
        :root
        {
            --text-color:blue;
        }
        h1
        {
            color:var(--text-color);
        }
    </style>
</head>
<body>
    <?php
    // $scope.Rf =function()
    // {
    //     $FirstName="Inthrajith";
    //     $LastName="Vijayan";
    // }
    ?>
    <!-- <div ng-app='' ng-init="$scope.Rf()"> -->
    <div ng-app='' ng-init="FirstName='Inthrajith'">
    <P>Enter Something Text</P>
    <P>Text</P><input type="text" ng-model='name'>
    <h1>{{name}}</h1>
    <div>

<p>The name is <span ng-bind="FirstName"></span></p>
<p>Iam {{FirstName}}.I'm From Pondicherry</p>

</div>
    </div>
</body>
</html>