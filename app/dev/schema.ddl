DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS activities CASCADE;
DROP TABLE IF EXISTS participants CASCADE;

create table users (
    utorid VARCHAR(10) PRIMARY KEY,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(30) NOT NULL,
    name VARCHAR(20) NOT NULL,
    dateOfBirth DATE NOT NULL,
    dateJoined DATE DEFAULT CURRENT_DATE
);

CREATE TABLE activities (
    id SERIAL PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    location VARCHAR(50),
    startTime TIMESTAMP,
    endTime TIMESTAMP,
    creator VARCHAR(10) REFERENCES users(utorid),
    participants INTEGER DEFAULT 0,
    maxParticipants INTEGER DEFAULT 1,
    active BOOLEAN,
    description TEXT,
    CHECK (participants <= maxParticipants)
);

CREATE TABLE participants (
    activity_id INTEGER NOT NULL REFERENCES activities(id),
    utorid VARCHAR(10) NOT NULL REFERENCES users(utorid),
    PRIMARY KEY(activity_id,utorid)
);
