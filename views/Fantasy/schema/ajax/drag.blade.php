
<script type="text/javascript">
    function AllowDrop(event){
        event.preventDefault();
    }

    function Drag(event){
   
        deleteMenu(event.currentTarget.id);
        event.dataTransfer.setData("text",event.currentTarget.id);
        
    }

    function Drop(event){
        event.preventDefault();
        var data=event.dataTransfer.getData("text");
        event.currentTarget.appendChild(document.getElementById(data));
        //console.log(data);
    }

    function deleteMenu(menuItem){
        $.ajax({
            url: "{{ ItemMaker::url('Fantasy/schema/drop') }}",
            data:{menuItem},
            type:"get",
            success: function (result) {
                        //location.reload();
                        console.log(result);
                    }
                });
       
    }
</script>