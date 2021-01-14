<template>
      <video-link-component v-if="src" :src="src" :type="type" :post="post" />
</template>

<script>

import VideoLinkComponent from './VideoLinkComponent';


export default {
	name: "VideoExample",
	components: {
		VideoLinkComponent
	},
	data() {
		return {
            player: null,
            allowedVideo:["mp4", "3gp", "ogg","wmv", "mov","avi",'webm',"mkv", 'mpv'],
            src:'',
            type: '',
            post:[],
			videoOptions: {
                autoplay: true,
                preload: "auto",
                controls: true,
                width: 400,
                height: 400,
				sources: [
					{
						src:"",
                        type:""
                    }
				]
			}
		};
    },

    mounted(){
        this.allVideoUrl();
    },
    methods:{
         allVideoUrl(){
            axios.get('video/url').then(res=>{
                this.src= res.data[0];
                this.type=this.getFileExtension(res.data[0]);
                  for (let index = 0; index < res.data.length; index++) {
                      this.post.push(res.data[index]);
                  }
                 console.log(this.post);
            }).catch(error=>{
                console.log(error);
            })
     },
        getFileExtension(filename) {
            try{
                const url = new URL(filename)
                const extensions = url.pathname.split(".")
                var urlHost = url.hostname.split(".");
                var extension = extensions[extensions.length-1];
                if(this.allowedVideo.includes(extension) ){
                    return 'video/'+extension;
                }else if(urlHost[1]=='youtube'){
                    return 'video/'+urlHost[1];
                }
            }catch(error){
                if(error instanceof TypeError) {
                    console.log(error);
                    return 'error'
                }
            }
        }
    },
    created(){
    //pseudo code
    axios.get('video/url').then((res) => {
        console.log(res);
        console.log(this.src)
        this.src = res.data[0];
        this.type = this.getFileExtension(res.data[0])
    }).catch((err) => {
        console.log(err);
    });
}

};
</script>



