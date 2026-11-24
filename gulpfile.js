const { pipeline } = require('stream')
const gulp = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const postcss = require('gulp-postcss')
const autoprefixer = require('autoprefixer')

const isProduction = process.argv.includes('--production')
const src = './theme/assets/css/src/*.scss'
const dest = './theme/assets/css'

function compileSass (done) {
  pipeline(
    gulp.src(src, { sourcemaps: !isProduction }),
    sass({
      style: 'compressed',
      silenceDeprecations: ['import']
    }),
    postcss([autoprefixer({ cascade: false })]),
    gulp.dest(dest, { sourcemaps: '.' }),
    done
  )
}

function watchSass () {
  gulp.watch(src, compileSass)
}

exports.sass = compileSass
exports.watch = watchSass
exports.default = compileSass
