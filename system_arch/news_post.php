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
            <div class="mini">Post news or article</div>
            <form id="post-form" onsubmit="return submitPostForm(event)" action="./php/news.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="post-title">Title</label> <br>
                    <input type="text" id="post-title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="post-content">Content</label><br>
                    <textarea id="content" name="content" rows="4" cols="auto" maxlength="2000"></textarea> 
                    <div class="content-status" id="content-status"></div>
                </div>
                <div class="form-group">
                    <label for="post-image">Image</label><br>
                    <input type="file" id="post-video" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="post-video">Video</label><br>
                    <input type="file" id="video" name="video" accept="video/*" required>
                </div>
                <div class="form-group">
                    <label for="post-category">Post category</label><br>
                    <select name="category" id="">
                        <option value="Politics">Politics</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Sports">Sports</option>
                        <option value="University news">University news</option>
                        <option value="Foreign affairs">Foreign affairs</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="post-tag">Tag</label><br>
                    <input type="text" id="post-tag" name="tag">
                </div>
                <div class="form-group">
                    <label for="post-link">Link</label><br>
                    <input type="text" id="post-title" name="link">
                </div>
                <button type="submit" name="post-news" class="post-news-btn">Post</button>
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








