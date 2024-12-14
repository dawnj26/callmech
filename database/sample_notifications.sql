INSERT INTO notifications (user_id, message, type, created_at) VALUES
(12, 'Your car service request #123 has been accepted', 'booking', NOW() - INTERVAL 1 DAY),
(12, 'Payment received for service #123', 'payment', NOW() - INTERVAL 23 HOUR),
(12, 'Mechanic is on the way to your location', 'service_update', NOW() - INTERVAL 20 HOUR),
(12, 'Service completed - Please rate your experience', 'feedback', NOW() - INTERVAL 18 HOUR),
(12, 'Special discount: 20% off on next service booking', 'promotion', NOW() - INTERVAL 15 HOUR),
(12, 'Upcoming maintenance reminder for your vehicle', 'reminder', NOW() - INTERVAL 12 HOUR),
(12, 'New feature available: Chat with mechanic', 'system', NOW() - INTERVAL 8 HOUR),
(12, 'Your booking #124 has been scheduled for tomorrow', 'booking', NOW() - INTERVAL 5 HOUR),
(12, 'Document verification pending', 'alert', NOW() - INTERVAL 2 HOUR),
(12, 'Weekend special offer: Free car wash with service', 'promotion', NOW());
