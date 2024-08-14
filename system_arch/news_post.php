<style>
    .content-status{
    background-color: rgb(255, 224, 231);
    color: crimson;
    font-size: 16px;
    /* padding: 5px; */
    border-radius: 5px;
    padding-left: 10px;
}
</style>

<div class="post-form-container">
            <h1>Create post</h1>
            <div>Post news or article</div>
            <form id="post-form" onsubmit="return submitPostForm(event)" action="./php/news.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="post-title">Title</label>
                    <input type="text" id="post-title" name="title">
                </div>
                <div class="form-group">
                    <label for="post-content">Content</label>
                    <textarea id="content" name="content" rows="4" cols="auto" maxlength="2000"></textarea>
                    <div class="content-status" id="content-status"></div>
                </div>
                <div class="form-group">
                    <label for="post-image">Image</label>
                    <input type="file" id="post-video" name="image" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="post-video">Video</label>
                    <input type="file" id="video" name="video" accept="video/*">
                </div>
                <button type="submit" name="post-news">Submit</button>
            </form>
</div>


        <script>
            let content = document.getElementById("content");
            let contStatus = document.getElementById("content-status");
            content.addEventListener("change", ()=>{
                let contentValue = content.value;
                console.log(contentValue);
                if(contentValue.length > 2000){
                    console.log("too long");
                    contStatus.innerHTML = "Content can not exceed 2000 characters.";
                }else{
                    contStatus.innerHTML = "";
                }
            })
        </script>








