define({ "api": [
  {
    "type": "get",
    "url": "/Base/captcha",
    "title": "02、图片验证码地址",
    "group": "Base",
    "version": "1.0.0",
    "description": "<p>图片验证码</p>",
    "success": {
      "examples": [
        {
          "title": "01 调用示例",
          "content": "<img src=\"http://xxxx.com/Base/captcha\" onClick=\"this.src=this.src+'?'+Math.random()\" alt=\"点击刷新验证码\">",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Base.php",
    "groupTitle": "Base",
    "name": "GetBaseCaptcha"
  },
  {
    "type": "post",
    "url": "/Base/upload",
    "title": "01、图片上传",
    "group": "Base",
    "version": "1.0.0",
    "description": "<p>图片上传</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回图片地址</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Base.php",
    "groupTitle": "Base",
    "name": "PostBaseUpload"
  },
  {
    "type": "get",
    "url": "/Lists/index",
    "title": "01、首页数据列表",
    "group": "Lists",
    "version": "1.0.0",
    "description": "<p>首页数据列表</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "limit",
            "description": "<p>每页数据条数（默认20）</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "page",
            "description": "<p>当前页码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "agent",
            "description": "<p>所属代理/ID</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "zname",
            "description": "<p>真实姓名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "phone",
            "description": "<p>手机号</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "xgname",
            "description": "<p>新股名称</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "codes",
            "description": "<p>申购代码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "nums",
            "description": "<p>申购数量</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "bzj",
            "description": "<p>保证金</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "zts",
            "description": "<p>状态 已中签|1|success,未中签|2|warning,待审核|3|info</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "mrsj_start",
            "description": "<p>买入时间开始</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "mrsj_end",
            "description": "<p>买入时间结束</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.list",
            "description": "<p>返回数据列表</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.count",
            "description": "<p>返回数据总数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"查询失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Lists.php",
    "groupTitle": "Lists",
    "name": "GetListsIndex"
  },
  {
    "type": "get",
    "url": "/Lists/view",
    "title": "05、查看详情",
    "group": "Lists",
    "version": "1.0.0",
    "description": "<p>查看详情</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "lists_id",
            "description": "<p>主键ID</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据详情</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"没有数据\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Lists.php",
    "groupTitle": "Lists",
    "name": "GetListsView"
  },
  {
    "type": "post",
    "url": "/Lists/add",
    "title": "02、添加",
    "group": "Lists",
    "version": "1.0.0",
    "description": "<p>添加</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "agent",
            "description": "<p>所属代理/ID</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "zname",
            "description": "<p>真实姓名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>手机号</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "xgname",
            "description": "<p>新股名称</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "codes",
            "description": "<p>申购代码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "nums",
            "description": "<p>申购数量</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "bzj",
            "description": "<p>保证金</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "zts",
            "description": "<p>状态 已中签|1|success,未中签|2|warning,待审核|3|info</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "mrsj",
            "description": "<p>买入时间</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Lists.php",
    "groupTitle": "Lists",
    "name": "PostListsAdd"
  },
  {
    "type": "post",
    "url": "/Lists/delete",
    "title": "04、删除",
    "group": "Lists",
    "version": "1.0.0",
    "description": "<p>删除</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "lists_ids",
            "description": "<p>主键id 注意后面跟了s 多数据删除</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Lists.php",
    "groupTitle": "Lists",
    "name": "PostListsDelete"
  },
  {
    "type": "post",
    "url": "/Lists/update",
    "title": "03、修改",
    "group": "Lists",
    "version": "1.0.0",
    "description": "<p>修改</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "lists_id",
            "description": "<p>主键ID (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "agent",
            "description": "<p>所属代理/ID</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "zname",
            "description": "<p>真实姓名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "phone",
            "description": "<p>手机号</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "xgname",
            "description": "<p>新股名称</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "codes",
            "description": "<p>申购代码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "nums",
            "description": "<p>申购数量</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "bzj",
            "description": "<p>保证金</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "zts",
            "description": "<p>状态 已中签|1|success,未中签|2|warning,待审核|3|info</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "mrsj",
            "description": "<p>买入时间</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Lists.php",
    "groupTitle": "Lists",
    "name": "PostListsUpdate"
  },
  {
    "type": "get",
    "url": "/Newlist/index",
    "title": "01、首页数据列表",
    "group": "Newlist",
    "version": "1.0.0",
    "description": "<p>首页数据列表</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "limit",
            "description": "<p>每页数据条数（默认20）</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "page",
            "description": "<p>当前页码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "names",
            "description": "<p>新股名称</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "code",
            "description": "<p>申购代码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "price",
            "description": "<p>发行价格</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "zt",
            "description": "<p>状态 开启|1,关闭|0</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.list",
            "description": "<p>返回数据列表</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.count",
            "description": "<p>返回数据总数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"查询失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Newlist.php",
    "groupTitle": "Newlist",
    "name": "GetNewlistIndex"
  },
  {
    "type": "get",
    "url": "/Tests/index",
    "title": "01、首页数据列表",
    "group": "Tests",
    "version": "1.0.0",
    "description": "<p>首页数据列表</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "limit",
            "description": "<p>每页数据条数（默认20）</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "page",
            "description": "<p>当前页码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "age",
            "description": "<p>年龄</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.list",
            "description": "<p>返回数据列表</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.count",
            "description": "<p>返回数据总数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"查询失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Tests.php",
    "groupTitle": "Tests",
    "name": "GetTestsIndex"
  },
  {
    "type": "get",
    "url": "/Tests/view",
    "title": "05、查看详情",
    "group": "Tests",
    "version": "1.0.0",
    "description": "<p>查看详情</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "tests_id",
            "description": "<p>主键ID</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据详情</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"没有数据\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Tests.php",
    "groupTitle": "Tests",
    "name": "GetTestsView"
  },
  {
    "type": "post",
    "url": "/Tests/add",
    "title": "02、添加",
    "group": "Tests",
    "version": "1.0.0",
    "description": "<p>添加</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "age",
            "description": "<p>年龄</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Tests.php",
    "groupTitle": "Tests",
    "name": "PostTestsAdd"
  },
  {
    "type": "post",
    "url": "/Tests/delete",
    "title": "04、删除",
    "group": "Tests",
    "version": "1.0.0",
    "description": "<p>删除</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "tests_ids",
            "description": "<p>主键id 注意后面跟了s 多数据删除</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Tests.php",
    "groupTitle": "Tests",
    "name": "PostTestsDelete"
  },
  {
    "type": "post",
    "url": "/Tests/update",
    "title": "03、修改",
    "group": "Tests",
    "version": "1.0.0",
    "description": "<p>修改</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "tests_id",
            "description": "<p>主键ID (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "age",
            "description": "<p>年龄</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Tests.php",
    "groupTitle": "Tests",
    "name": "PostTestsUpdate"
  }
] });
