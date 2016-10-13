var SystemChecker = function(oConfig){
}; 

SystemChecker.prototype.generateCommandFile = function(){ 
    $.ajax({ 
        url : '/admin/system/generateCommand',
        type: 'post',
        success:function(){
        }
    }) ;
};
