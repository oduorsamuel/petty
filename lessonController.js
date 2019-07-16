const Lessons = require('../models/Lesson');
const Courses = require('../models/Courses');

exports.get_all_lessons = (req, res, next) => {
    Lessons.find()
        .select("lessonName")
        .populate('course', 'courseName')
        .exec()
        .then(lesson => {
            res.json({
                status: "Ok",
                code: "200.4.10",
                message: "lessons fetched successfully",
                data: lesson.map(lesson => {
                    return {
                        Data: lesson,
                        url: [{
                            type: 'GET',
                            url: 'localhost:4000/v1/lessons/' + lesson._id
                        }, {
                            type: 'DELETE',
                            url: 'localhost:4000/v1/lessons/' + lesson._id
                        }]
                    }
                })
            })
        })
        .catch(err => {
            res.json({
                status: "bad request",
                code: "400.4.11",
                message: "Server error",
                error: err
            })
        })
}

exports.post_lesson = (req, resu) => {
    const lessonData = new Lessons({
        lessonName: req.body.lessonName,
        startDate: req.body.startDate,
        signUpStartDate: req.body.signUpStartDate,
        signUpEndDate: req.body.signUpEndDate,
        endDate: req.body.endDate,
        passWithin: req.body.passWithin,
        course: req.body.courseId,
        teacher: req.body.teacher
    });
    lessonData.save().then(
        result => {
            if (result) {
                Courses.findById(req.body.courseId, (err, course) => {
                    if (course) {
                        course.Lessons.push(lessonData);
                        course.save((err, res) => {
                            resu.json({
                                status: "ok",
                                code: "200.4.12",
                                message: "Lesson successfully added to the selected course"
                            })
                        })
                    } else {
                        resu.json({
                            status: "Not found",
                            code: "404.4.12",
                            message: "course not found"
                        })
                    }
                });
            } else {
                resu.json({
                    status: "bad request",
                    code: "400.4.13",
                    message: "Failled to create the lesson"
                })

            }
        }
    ).catch(err=>{
        resu.json({
            status: "server error",
            code: "500.4.13",
            error: err
        })
    })
};
exports.get_by_id = (req, res, next) => {
    Lessons.findById(req.params.id)
        .populate('course', 'courseName')
        .exec()
        .then(lesson => {
            res.json({
                status: "ok",
                code: "200.4.14",
                message: "lesson fetched",
                data: lesson,
                url: {
                    Type: "DELETE",
                    url: 'localhost:4000/v1/lessons/' + lesson._id,
                }
            })
        })
        .catch(err => {
            res.json({
                status: "bad request",
                code: "400.4.15",
                message: "lesson not fetched",
                data: err
            })
        })

}

exports.delete_by_id = (req, res) => {
    Lessons.findByIdAndRemove(req.params.id)
        .exec()
        .then(lesson => {
            res.json({
                status: "ok",
                code: "200.4.16",
                message: "lesson deleted successfully",
                url: {
                    type: 'POST',
                    url: 'localhost:4000/v1/lessons',
                    body: {
                        lessonName: "String",
                        startDate: "Date",
                        signUpStartDate: "Date",
                        signUpEndDate: "Date",
                        endDate: "Date",
                        courseId: "String",
                        passWithin: Number,
                        teacher: "String"
                    }
                }
            })
        })
        .catch(err => {
            res.json({
                status: "bad request",
                code: "400.4.17",
                message: "lesson not deleted",
                data: err
            })
        })
}

exports.delete_all = (req, res) => {
    Lessons.remove()
        .exec()
        .then(lesson => {
            res.json({
                status: "ok",
                code: "200.4.18",
                message: "all lessons removed",
                url: {
                    type: 'POST',
                    url: 'localhost:4000/v1/lessons',
                    body: {
                        lessonName: "String",
                        startDate: "Date",
                        signUpStartDate: "Date",
                        signUpEndDate: "Date",
                        endDate: "Date",
                        courseId: "String",
                        passWithin: Number,
                        teacher: "String"
                    }
                }
            })
        })
        .catch(err => {
            res.json({
                status: "bad request",
                code: "400.4.19",
                message: "lessons not deleted",
                data: err
            })
        })
}

exports.update = (req, res) => {
    Lessons.findById(req.params.id, (err, Lesson) => {
        if (!Lesson)
            res.json({
                status: "not found",
                code: "404.4.20",
                message: "lessons not found",
            })
        else {
            Lesson.lessonName = req.body.lessonName;
            Lesson.startDate = req.body.startDate;
            Lesson.signUpStartDate = req.body.signUpStartDate;
            Lesson.signUpEndDate = req.body.signUpEndDate;
            Lesson.endDate = req.body.endDate;
            Lesson.passWithin = req.body.passWithin;
            Lesson.course = req.body.courseId,
                Lesson.teacher = req.body.teacher,
                Lesson.updated_by = "Sam",
                Lesson.updated_at = Date.now()
            Lesson.save()
                .then(result => {
                    res.json(result)
                }).catch(err => {
                    res.json(err)
                });
        }
    });
}