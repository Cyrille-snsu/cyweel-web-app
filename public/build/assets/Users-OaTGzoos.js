import{_ as n}from"./AdminNav-De0OgebD.js";import{_ as c}from"./Pagination-BXid9VVM.js";import{c as i,a as r,b as t,F as l,r as x,o,t as a}from"./app-DkVHQ-2S.js";const p={class:"min-h-screen bg-gray-100"},m={class:"py-6"},_={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},h={class:"bg-white overflow-hidden shadow-sm sm:rounded-lg"},g={class:"p-6"},y={class:"overflow-x-auto"},u={class:"min-w-full divide-y divide-gray-200"},w={class:"bg-white divide-y divide-gray-200"},f={class:"px-6 py-4 whitespace-nowrap text-sm text-gray-500"},v={class:"px-6 py-4 whitespace-nowrap"},b={class:"text-sm font-medium text-gray-900"},k={class:"px-6 py-4 whitespace-nowrap"},D={class:"text-sm text-gray-900"},B={class:"px-6 py-4 whitespace-nowrap text-sm text-gray-500"},N={class:"mt-4"},U={__name:"Users",props:{users:{type:Object,required:!0}},setup(d){return(E,e)=>(o(),i("div",p,[r(n),e[1]||(e[1]=t("header",{class:"bg-white shadow"},[t("div",{class:"max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"},[t("h1",{class:"text-3xl font-bold text-gray-900"},"Users Management")])],-1)),t("main",m,[t("div",_,[t("div",h,[t("div",g,[t("div",y,[t("table",u,[e[0]||(e[0]=t("thead",{class:"bg-gray-50"},[t("tr",null,[t("th",{class:"px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"},"ID"),t("th",{class:"px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"},"Name"),t("th",{class:"px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"},"Email"),t("th",{class:"px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"},"Joined Date")])],-1)),t("tbody",w,[(o(!0),i(l,null,x(d.users.data,s=>(o(),i("tr",{key:s.id},[t("td",f,a(s.id),1),t("td",v,[t("div",b,a(s.name),1)]),t("td",k,[t("div",D,a(s.email),1)]),t("td",B,a(new Date(s.created_at).toLocaleDateString()),1)]))),128))])])]),t("div",N,[r(c,{links:d.users.links},null,8,["links"])])])])])])]))}};export{U as default};
