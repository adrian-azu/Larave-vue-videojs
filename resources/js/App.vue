<template>
      <!-- <video-link-component :options="videoOptions"/> -->
      <!-- <VideoLinkComponent :options="videoOptions"/> -->
      <video-player :option="videoOptions"/>
</template>

<script>

import VideoLinkComponent from './components/VideoLinkComponent';
//import BootstrapDatatable from "./components/BootstrapDatatable.vue";

export default {
	name: "VideoExample",
	components: {
		VideoLinkComponent
	},
	data() {
		return {
            player: null,
            errorHandle:"",
            file2:null,
            videolink: this.selected,
            selected: '',
            allowedVideo:["mp4", "3gp", "ogg","wmv", "mov","avi",'webm',"mkv", 'mpv'],
			videoOptions: {
                autoplay: true,
                preload: "auto",
                controls: true,
                width: 400,
                height: 400,
				sources: [
					{
						src: "",
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
                 console.log(res.data.length);
                 for (let index = 0; index < res.data.length; index++) {
                    this.videoOptions.sources.filter(function (el) {
                        return el.src !='' && el.type !='';
                    });
                    this.videoOptions.sources.push({
                         'src': res.data[index],
                         'type': this.getFileExtension(res.data[index])
                         });
                 }
                this.videoURL= res;
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
    }
};
</script>



