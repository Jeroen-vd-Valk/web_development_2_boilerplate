-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS developmentdb;

-- Use the developmentdb database
USE developmentdb;

-- Create articles table
CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    published DATE NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_category (category),
    INDEX idx_author (author),
    INDEX idx_published (published)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data
INSERT INTO articles (title, author, category, published, content) VALUES
('New Article Title', 'John Doe', 'Technology', '2025-01-15', 'This is the content of the new article.'),
('Updated Article Title', 'Jane Smith', 'Science', '2025-01-16', 'This is the updated content of the article.'),
('Introduction to Web Development', 'Alice Johnson', 'Technology', '2025-01-10', 'Web development is the process of building websites and web applications. It involves both frontend and backend development.'),
('The Future of Artificial Intelligence', 'Bob Williams', 'Science', '2025-01-12', 'Artificial Intelligence is rapidly transforming various industries. This article explores the latest trends and future possibilities.'),
('Healthy Living Tips', 'Carol Brown', 'Health', '2025-01-14', 'Maintaining a healthy lifestyle requires a balanced diet, regular exercise, and adequate sleep. Here are some practical tips to get started.'),
('Understanding Database Design', 'David Miller', 'Technology', '2025-01-17', 'Database design is crucial for building scalable applications. Learn about normalization, indexing, and best practices.'),
('Climate Change and Renewable Energy', 'Emma Davis', 'Science', '2025-01-18', 'As climate change becomes more pressing, renewable energy sources are essential. Solar, wind, and hydroelectric power offer sustainable alternatives to fossil fuels.'),
('The Art of Cooking Italian Cuisine', 'Frank Garcia', 'Food', '2025-01-19', 'Italian cuisine is known for its simplicity and quality ingredients. Learn the secrets of making authentic pasta, risotto, and traditional Italian dishes.'),
('Exploring Machine Learning Algorithms', 'Grace Lee', 'Technology', '2025-01-20', 'Machine learning algorithms form the backbone of modern AI systems. This article covers supervised, unsupervised, and reinforcement learning approaches.'),
('Mental Health Awareness in the Workplace', 'Henry Taylor', 'Health', '2025-01-21', 'Workplace mental health is crucial for employee well-being and productivity. Discover strategies for creating a supportive work environment.'),
('Travel Guide: Exploring Southeast Asia', 'Isabella Martinez', 'Travel', '2025-01-22', 'Southeast Asia offers incredible diversity, from bustling cities to pristine beaches. This guide covers must-visit destinations and travel tips.'),
('Cryptocurrency and Blockchain Basics', 'Jack Anderson', 'Finance', '2025-01-23', 'Understanding cryptocurrency and blockchain technology is essential in today\'s digital economy. Learn the fundamentals of Bitcoin, Ethereum, and smart contracts.'),
('Sustainable Fashion Trends', 'Kate Wilson', 'Fashion', '2025-01-24', 'The fashion industry is embracing sustainability. Discover eco-friendly materials, ethical production practices, and brands leading the change.'),
('Space Exploration: Mars Mission Updates', 'Liam O\'Connor', 'Science', '2025-01-25', 'Recent advances in space technology bring us closer to Mars colonization. This article covers the latest mission updates and technological breakthroughs.'),
('Effective Time Management Strategies', 'Mia Thompson', 'Business', '2025-01-26', 'Time management is key to productivity. Learn proven techniques like the Pomodoro method, task prioritization, and goal setting.'),
('The Rise of Electric Vehicles', 'Noah Brown', 'Technology', '2025-01-27', 'Electric vehicles are revolutionizing transportation. Explore the latest EV models, charging infrastructure, and environmental benefits.'),
('Meditation and Mindfulness Practices', 'Olivia White', 'Health', '2025-01-28', 'Meditation offers numerous health benefits including reduced stress and improved focus. Learn different meditation techniques and how to start your practice.');
