Simple Blog example with codeigniter
====================================

目錄
----------

*	[簡介](#intro)
*	[檔案架構](#structure)
*	[網站需求表](#requirement)
*	[參考資料](#reference)
  
* * *

<h2 id="intro">簡介</h2>

這個練習是用來了解MVC架構跟加深所學的觀念，由於我前端跟軟體架構上的知識不足，給人的感覺十分的單薄，資安的部分也蠻多需要改善的，期望將來可以做的更好!

* * *

<h2 id="structure">檔案架構</h2>

以下為此專案的架構示意圖:

	|- Folder structure
		|- Blog
			|- application
				|- cofig
					|- config				-- 設定base_url、csrf_protection
					|- autoload				-- 設定helper、library自動載入
					|- database				-- 資料庫連線設定
					|- form_validation		-- 表單驗證的相關設定
					|- route				-- url路由相關設定
				|- controllers			
					|- Article			 	-- 主要為文章的新增、刪除...等請求處理
					|- Album				-- 主要為照片的新增、刪除...等請求處理
					|- Auth					-- 主要為登入、註冊、登出
				|- models				
					|- Article_model		-- 處理文章相關的資料處理
					|- Album_model			-- 處理照片相關的資料處理
					|- Users_model			-- 使用者相關的資料處理
				|- views				
					|-admin					** 以下檔案為後台的視圖
						|- album			-- 照片首頁
						|- addAlbum 		-- 照片新增頁面	
						|- editAlbum		-- 照片資訊編輯頁面
						|- article 			-- 文章首頁
						|- addArticle		-- 文章新增頁面	
						|- editArticle		-- 文章資料編輯頁面
					|-template				
						|- admin			** 後台的樣板
							|- header 				
							|- nav
							|- footer			
						|- header 			** 樣板
						|- nav
						|- footer
					|- register 			-- 註冊頁面
					|- login  				-- 登入頁面
					|- album				-- 照片首頁
					|- article 				-- 文章首頁
					|- showAlbum 		    -- 單張照片頁面
					|- showArticle 			-- 單篇文章頁面
			|- assets
				|- js
					|- bootstrap.min.js
				|- css
					|- bootstrap.min.css  	
					|- styles.css 			-- 自訂樣式 				
			|- uploads 						-- 照片上傳的資料夾

* * *

<h2 id="#requirement">網站需求表</h2>

![Requirement](https://dl.dropbox.com/s/tbxbvbbeavwv8oh/blog_requirement.jpg?dl=0)

* * *

<h2 id="#database">資料庫</h2>

### blog

#### users
	-id 			int(11)
	-user			varchar(30) 
	-password 		varchar(30) 
	-name 			varchar(30)
	-phone 	 		varchar(30)
	-gender 		char(10) 
	-address 		varchar(255)
	-birthday 		timestamp 
	-Email 			char(30)

#### albums
	- id		 	int(11) 
	- user_id		int(11)
	- title 		varchar(255)
	- intro			text 
	- path			varchar(255) 
	- created_at  	timestamp 

#### articles
	- id  			int(11) 
	- user_id 		int(11)  
	- title 		varchar(255)
	- content 		text
	- created_at 	timestamp
 
* * *

<h2 id="#reference">參考資料</h2>

- 網站:[Codeigniter][1]
- 網站:[W3schools][2]
- 教學影片:[Codeigniter Tutorial in Hindi][3]

[1]:https://www.w3schools.com/
[2]:https://www.codeigniter.com/user_guide/
[3]:https://www.youtube.com/watch?v=wRmBCh1J464&list=PLHFGzOr0F8DI5IBxWWzHvdUL_HmWUAqg2
