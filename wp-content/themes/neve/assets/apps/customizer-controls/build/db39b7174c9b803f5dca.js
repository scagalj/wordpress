"use strict";(self.webpackChunkneve=self.webpackChunkneve||[]).push([[63],{63:function(e,t,i){i.r(t);var n=i(307),o=i(697),a=i.n(o),s=i(167);const r=({onChange:e,currentValue:t,label:i,id:o,toolbars:a,allowedDynamicFields:r})=>{var l,c;const d=(0,n.useRef)(null),u=Boolean(Array.isArray(r)&&r.length),m="formatselect,bold,italic,bullist,numlist,link,wp_adv",v="strikethrough,hr,forecolor,pastetext,removeformat",{toolbar1:f=m,toolbar2:w=v}=a,g=`${o}-editor`;NeveReactCustomize.fieldSelection={};const y=wp.oldEditor||wp.editor,h=(0,n.useCallback)((()=>e(y.getContent(g))),[g]),p=()=>{window.tinymce.editors[g]&&window.tinymce.editors[g].on("change",h)},b=t=>{e(t),window.tinymce.editors[g].setContent(t)};return(0,n.useEffect)((()=>{d&&d.current&&(d.current.addEventListener("change",(()=>{b(d.current.value)})),d.current.addEventListener("focusout",(function(e){NeveReactCustomize.fieldSelection[o]={start:e.target.selectionStart,end:e.target.selectionEnd}}))),y.initialize(g,{quicktags:!0,mediaButtons:!0,tinymce:{toolbar1:f,toolbar2:w,style_formats_merge:!0,style_formats:[]}}),setTimeout(p,0),wp.oldEditor&&setTimeout((()=>{window.tinymce.editors[g]&&window.tinymce.editors[g].off("change",h),y.remove(g),y.initialize(g,{quicktags:!0,mediaButtons:!0,tinymce:{toolbar1:f,toolbar2:w,style_formats_merge:!0,style_formats:[]}}),setTimeout(p,0)}),300)}),[]),(0,n.useEffect)((()=>{document.addEventListener("neve-changed-customizer-value",(e=>!!e.detail&&e.detail.id===o&&void b(e.detail.value)))}),[]),(0,n.createElement)("div",{className:"neve-white-background-control neve-rich-text",style:{position:"relative"}},(0,n.createElement)("span",{className:"customize-control-title"},i),u&&(0,n.createElement)("span",{style:{position:"absolute",top:0,right:"8px"}},(0,n.createElement)(s.Z,{options:(null===(l=NeveReactCustomize)||void 0===l||null===(c=l.dynamicTags)||void 0===c?void 0:c.options)||[],allowedOptionsTypes:r,onSelect:(e,t)=>function(e,t){let i;const n=d.current;if(i="url"===t?`<a href="{${e}}">Link</a>`:`{${e}}`,window.tinymce.editors[g].hidden){if(NeveReactCustomize.fieldSelection[o]){const{start:e,end:t}=NeveReactCustomize.fieldSelection[o],a=n.value.length;n.value=n.value.substring(0,e)+i+n.value.substring(t,a)}else n.value+=i;n.focus()}else window.tinymce.editors[g].editorCommands.execCommand("mceInsertContent",!1,i),window.tinymce.editors[g].focus();n.dispatchEvent(new Event("change"))}(e,t)})),(0,n.createElement)("textarea",{ref:d,id:g,className:"neve-custom-html-control-tinymce-editor mce-tinymce",value:t,style:{width:"100%"},onChange:({target:{value:t}})=>e(t)}))};r.propTypes={id:a().string.isRequired,toolbars:a().object,allowedDynamicFields:a().array,label:a().string.isRequired,onChange:a().func.isRequired,currentValue:a().string.isRequired},t.default=r}}]);