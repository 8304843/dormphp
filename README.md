┌─common        		存放全局公共样式
│─components            符合vue组件规范的uni-app组件目录
│  ├─comp-a.vue         可复用的a组件（注意组件命名方式xx-xx.vue）
│  └─dialog				存放模态框
│     └─list.vue 		对应页面的模态框
├─pages                 业务页面文件存放的目录
│  ├─index
│  │  └─index.vue       index页面
│  └─list
│     └─List.vue        List页面(注意命名方式：除index外，其余皆为驼峰命名)
├─static                存放应用引用静态资源（如图片、视频等）的目录，注意：静态资源只能存放于此
├─main.js               Vue初始化入口文件
├─App.vue               应用配置，用来配置App全局样式以及监听 应用生命周期
├─manifest.json         配置应用名称、appid、logo、版本等打包信息
└─pages.json            配置页面路由、导航条、选项卡等页面类信息