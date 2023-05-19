let operateStart = 'ontouchstart' in document.documentElement ? 'touchstart' : 'mousedown',
  operateEnd = 'ontouchend' in document.documentElement ? 'touchend' : 'mouseup',
  operateMove = 'ontouchmove' in document.documentElement ? 'touchmove' : 'mousemove'
function getTranslateValues(e) {
  const s = window.getComputedStyle(e),
    t = s.transform || s.mozTransform
  if ('none' === t) return { x: 0, y: 0, z: 0 }
  const a = t.includes('3d') ? '3d' : '2d',
    i = t.match(/matrix.*\((.+)\)/)[1].split(', ')
  return '2d' === a
    ? { x: Number(i[4]), y: Number(i[5]), z: 0 }
    : '3d' === a
    ? { x: Number(i[12]), y: Number(i[13]), z: Number(i[14]) }
    : void 0
}
function getSlideTotalW(e) {
  const s = e.querySelector('.wrapper').querySelectorAll('.item')
  let t = 0
  return (
    s.forEach((e) => {
      const s = getComputedStyle(e),
        a = parseInt(s.marginLeft),
        i = parseInt(s.marginRight)
      t += e.getBoundingClientRect().width + a + i
    }),
    t
  )
}
function detectPos(e) {
  return getTranslateValues(e.slideWrapEl).x >= e.translateMin
    ? 'is-start'
    : getTranslateValues(e.slideWrapEl).x <= e.translateMax
    ? 'is-end'
    : getTranslateValues(e.slideWrapEl).x < e.translateMin && getTranslateValues(e.slideWrapEl).x > e.translateMax
    ? 'is-middle'
    : void 0
}
function eventHandler(e) {
  const s = e.el,
    t = s.querySelector('.wrapper')
  t.addEventListener(operateStart, function (s) {
    switch (((e.isDown = !0), e.slidable && t.classList.add('dragging'), operateStart)) {
      case 'mousedown':
        e.startX = s.pageX
        break
      case 'touchstart':
        e.startX = s.changedTouches[0].pageX
    }
    e.nowTranslateX = getTranslateValues(t).x
  }),
    t.addEventListener(operateEnd, function (a) {
      let i
      switch (((e.isDown = !1), t.classList.remove('dragging'), t.classList.remove('moving'), operateMove)) {
        case 'mousemove':
          i = a.pageX - e.startX
          break
        case 'touchmove':
          i = a.changedTouches[0].pageX - e.startX
      }
      if (0 === i && a.target.closest('.item')) {
        if ('mouseup' === operateEnd && 0 !== a.button) return
        t.querySelectorAll('.item').forEach((e) => {
          e.classList.remove('active')
        }),
          a.target.closest('.item').classList.add('active'),
          e.moveActive(e.params.speed)
      } else e.slidable && e.resetPos(s)
    }),
    t.addEventListener('mouseleave', function () {
      e.isDown &&
        e.slidable &&
        ((e.isDown = !1), t.classList.remove('dragging'), t.classList.remove('moving'), e.resetPos(s))
    }),
    t.addEventListener(operateMove, function (s) {
      if (e.draggable && e.slidable) {
        if (!e.isDown) return
        let a
        switch ((s.preventDefault(), operateMove)) {
          case 'mousemove':
            a = s.pageX - e.startX
            break
          case 'touchmove':
            a = s.changedTouches[0].pageX - e.startX
        }
        if (0 !== a) {
          t.classList.add('moving')
          const s = { transition: 'all 0ms ease 0s', transform: `translate3d(${e.nowTranslateX + a}px,0,0)` }
          Object.assign(t.style, s)
        }
      }
    })
}
function disableLinkDrag(e) {
  const s = e.querySelectorAll('a')
  for (var t = 0, a = s.length; t < a; t++) s[t].draggable = !1
}
class CategorySlider {
  constructor(e, s) {
    ;(this.el = 'string' == typeof e ? document.querySelector(e) : e),
      (this.slideWrapEl = this.el.querySelector('.wrapper')),
      (this.params = { speed: 300, clickSwitch: !0, breakpoint: !1 }),
      Object.assign(this.params, s),
      (this.draggable = !0),
      (this.isDown = !1),
      (this.startX = 0),
      (this.nowTranslateX = getTranslateValues(this.slideWrapEl).x),
      (this.slideTotalWidth = getSlideTotalW(this.el)),
      (this.translateMin = 0),
      (this.translateMax = -Math.floor(
        Math.abs(getSlideTotalW(this.el) - this.el.querySelector('.wrapper').getBoundingClientRect().width)
      )),
      (this.slidable =
        this.slideTotalWidth > Math.round(this.el.getBoundingClientRect().width) &&
        (!this.params.breakpoint || window.innerWidth <= this.params.breakpoint)),
      this.init()
  }
  init() {
    const e = this
    e.slidable &&
      ((e.slideWrapEl.style.width = `${e.slideTotalWidth}px`),
      e.el.classList.add('slidable'),
      e.slideWrapEl.querySelector('.item.active') && e.moveActive()),
      window.addEventListener('resize', function () {
        e.update()
      }),
      eventHandler(e),
      disableLinkDrag(e.el)
  }
  moveActive(e) {
    const s = this,
      t = s.slideWrapEl.querySelector('.item.active'),
      a = t.previousElementSibling ? t.offsetLeft - s.el.clientWidth / 2 + t.clientWidth / 2 : 0
    if (s.slidable) {
      if (-a < 0 && -a > s.translateMax) {
        const t = { transition: `all ${e || 0}ms ease 0s`, transform: `translate3d(-${a}px,0,0)` }
        Object.assign(s.slideWrapEl.style, t)
      } else if (-a >= 0) {
        const t = { transition: `all ${e || 0}ms ease 0s`, transform: 'translate3d(0,0,0)' }
        Object.assign(s.slideWrapEl.style, t)
      } else {
        const t = { transition: `all ${e || 0}ms ease 0s`, transform: `translate3d(${s.translateMax}px,0,0)` }
        Object.assign(s.slideWrapEl.style, t)
      }
      if (e)
        s.slideWrapEl.addEventListener(
          'transitionend',
          function () {
            switch (((s.nowTranslateX = getTranslateValues(s.slideWrapEl).x), detectPos(s))) {
              case 'is-start':
                s.el.classList.add('is-start'), s.el.classList.remove('is-end')
                break
              case 'is-middle':
                s.el.classList.remove('is-start'), s.el.classList.remove('is-end')
                break
              case 'is-end':
                s.el.classList.remove('is-start'), s.el.classList.add('is-end')
            }
          },
          !1
        )
      else
        switch (((s.nowTranslateX = getTranslateValues(s.slideWrapEl).x), detectPos(s))) {
          case 'is-start':
            s.el.classList.add('is-start'), s.el.classList.remove('is-end')
            break
          case 'is-middle':
            s.el.classList.remove('is-start'), s.el.classList.remove('is-end')
            break
          case 'is-end':
            s.el.classList.remove('is-start'), s.el.classList.add('is-end')
        }
    }
  }
  resetPos() {
    const e = this
    switch (detectPos(e)) {
      case 'is-start':
        e.el.classList.add('is-start'),
          e.el.classList.remove('is-end'),
          Object.assign(e.slideWrapEl.style, {
            transition: `all ${e.params.speed}ms ease 0s`,
            transform: 'translate3d(0,0,0)',
          })
        break
      case 'is-middle':
        e.el.classList.remove('is-start'), e.el.classList.remove('is-end')
        break
      case 'is-end':
        e.el.classList.remove('is-start'),
          e.el.classList.add('is-end'),
          Object.assign(e.slideWrapEl.style, {
            transition: `all ${e.params.speed}ms ease 0s`,
            transform: `translate3d(${e.translateMax}px,0,0)`,
          })
    }
  }
  update() {
    const e = this
    e.el.querySelector('.wrapper').removeAttribute('style'),
      (e.slideTotalWidth = getSlideTotalW(e.el)),
      (e.translateMax = -Math.floor(
        Math.abs(getSlideTotalW(e.el) - e.el.querySelector('.wrapper').getBoundingClientRect().width)
      )),
      (e.slidable =
        e.slideTotalWidth > Math.round(e.el.getBoundingClientRect().width) &&
        (!e.params.breakpoint || window.innerWidth <= e.params.breakpoint)),
      e.slidable
        ? ((e.slideWrapEl.style.width = `${e.slideTotalWidth}px`),
          e.el.classList.add('slidable'),
          e.slideWrapEl.querySelector('.item.active') && e.moveActive())
        : (e.el.classList.remove('slidable'),
          e.el.classList.remove('is-start'),
          e.el.classList.remove('is-end'),
          e.slideWrapEl.removeAttribute('style'))
  }
  moveNext(e) {
    const s = this,
      t = document.querySelector('.category-box .category-slider').getBoundingClientRect().width,
      a = t / 3 > 200 ? t / 3 : 200,
      i = s.translateMax
    if (s.slidable) {
      const t = getTranslateValues(s.slideWrapEl).x - a
      if ((console.log(t), t > i)) {
        const a = { transition: `all ${e || 0}ms ease 0s`, transform: `translate3d(${t}px,0,0)` }
        Object.assign(s.slideWrapEl.style, a)
      } else {
        const t = { transition: `all ${e || 0}ms ease 0s`, transform: `translate3d(${i}px,0,0)` }
        Object.assign(s.slideWrapEl.style, t)
      }
    }
    if (e)
      s.slideWrapEl.addEventListener(
        'transitionend',
        function () {
          switch (((s.nowTranslateX = getTranslateValues(s.slideWrapEl).x), detectPos(s))) {
            case 'is-start':
              s.el.classList.add('is-start'), s.el.classList.remove('is-end')
              break
            case 'is-middle':
              s.el.classList.remove('is-start'), s.el.classList.remove('is-end')
              break
            case 'is-end':
              s.el.classList.remove('is-start'), s.el.classList.add('is-end')
          }
        },
        !1
      )
    else
      switch (((s.nowTranslateX = getTranslateValues(s.slideWrapEl).x), detectPos(s))) {
        case 'is-start':
          s.el.classList.add('is-start'), s.el.classList.remove('is-end')
          break
        case 'is-middle':
          s.el.classList.remove('is-start'), s.el.classList.remove('is-end')
          break
        case 'is-end':
          s.el.classList.remove('is-start'), s.el.classList.add('is-end')
      }
  }
  movePrev(e) {
    const s = this,
      t = document.querySelector('.category-box .category-slider').getBoundingClientRect().width,
      a = t / 3 > 200 ? t / 3 : 200
    if (s.slidable) {
      const t = getTranslateValues(s.slideWrapEl).x + a
      if (t < 0) {
        const a = { transition: `all ${e || 0}ms ease 0s`, transform: `translate3d(${t}px,0,0)` }
        Object.assign(s.slideWrapEl.style, a)
      } else {
        const t = { transition: `all ${e || 0}ms ease 0s`, transform: 'translate3d(0px,0,0)' }
        Object.assign(s.slideWrapEl.style, t)
      }
    }
    if (e)
      s.slideWrapEl.addEventListener(
        'transitionend',
        function () {
          switch (((s.nowTranslateX = getTranslateValues(s.slideWrapEl).x), detectPos(s))) {
            case 'is-start':
              s.el.classList.add('is-start'), s.el.classList.remove('is-end')
              break
            case 'is-middle':
              s.el.classList.remove('is-start'), s.el.classList.remove('is-end')
              break
            case 'is-end':
              s.el.classList.remove('is-start'), s.el.classList.add('is-end')
          }
        },
        !1
      )
    else
      switch (((s.nowTranslateX = getTranslateValues(s.slideWrapEl).x), detectPos(s))) {
        case 'is-start':
          s.el.classList.add('is-start'), s.el.classList.remove('is-end')
          break
        case 'is-middle':
          s.el.classList.remove('is-start'), s.el.classList.remove('is-end')
          break
        case 'is-end':
          s.el.classList.remove('is-start'), s.el.classList.add('is-end')
      }
  }
}
//# sourceMappingURL=category-slider-dist.js.map
