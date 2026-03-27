<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Page;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\TeamMember;
use App\Models\SiteSetting;
use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::factory()->create([
            'name' => 'LuminaScott Admin',
            'email' => 'admin@luminascott.com',
            'password' => Hash::make('password'),
        ]);

        // Site Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'LuminaScott', 'type' => 'text', 'group' => 'general', 'label' => 'Site Name'],
            ['key' => 'site_description', 'value' => 'Pioneering AI Implementation for Forward-Thinking Businesses', 'type' => 'textarea', 'group' => 'general', 'label' => 'Site Description'],
            ['key' => 'site_logo', 'value' => '', 'type' => 'image', 'group' => 'general', 'label' => 'Site Logo'],
            ['key' => 'favicon', 'value' => '', 'type' => 'image', 'group' => 'general', 'label' => 'Favicon'],
            ['key' => 'contact_email', 'value' => 'hello@luminascott.com', 'type' => 'text', 'group' => 'contact', 'label' => 'Contact Email'],
            ['key' => 'contact_phone', 'value' => '+44 20 7946 0958', 'type' => 'text', 'group' => 'contact', 'label' => 'Contact Phone'],
            ['key' => 'contact_address', 'value' => '71-75 Shelton Street, Covent Garden, London, WC2H 9JQ', 'type' => 'textarea', 'group' => 'contact', 'label' => 'Contact Address'],
            ['key' => 'facebook', 'value' => 'https://facebook.com/luminascott', 'type' => 'text', 'group' => 'social', 'label' => 'Facebook URL'],
            ['key' => 'twitter', 'value' => 'https://twitter.com/luminascott', 'type' => 'text', 'group' => 'social', 'label' => 'Twitter / X URL'],
            ['key' => 'linkedin', 'value' => 'https://linkedin.com/company/luminascott', 'type' => 'text', 'group' => 'social', 'label' => 'LinkedIn URL'],
            ['key' => 'instagram', 'value' => 'https://instagram.com/luminascott', 'type' => 'text', 'group' => 'social', 'label' => 'Instagram URL'],
            ['key' => 'google_analytics', 'value' => '', 'type' => 'text', 'group' => 'seo', 'label' => 'Google Analytics ID'],
            ['key' => 'default_meta_title', 'value' => 'LuminaScott | AI Implementation & Consulting', 'type' => 'text', 'group' => 'seo', 'label' => 'Default Meta Title'],
            ['key' => 'default_meta_description', 'value' => 'LuminaScott is a leading AI implementation consultancy based in London. We help businesses harness the power of artificial intelligence to drive growth, efficiency, and innovation.', 'type' => 'textarea', 'group' => 'seo', 'label' => 'Default Meta Description'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }

        // Pages
        Page::create([
            'title' => 'About Us',
            'slug' => 'about',
            'content' => '<h2>About LuminaScott</h2>
<p>Founded in London, LuminaScott is a premier artificial intelligence consultancy dedicated to helping businesses navigate the transformative world of AI. We believe that every organisation, regardless of size or sector, deserves access to cutting-edge AI solutions that drive real, measurable results.</p>

<h3>Our Mission</h3>
<p>To democratise artificial intelligence by providing bespoke, practical AI solutions that empower businesses to operate more efficiently, make better decisions, and unlock new opportunities for growth.</p>

<h3>Our Approach</h3>
<p>We take a consultative, hands-on approach to AI implementation. Rather than offering one-size-fits-all solutions, we work closely with your team to understand your unique challenges, identify opportunities, and develop tailored AI strategies that integrate seamlessly with your existing operations.</p>

<h3>Why Choose LuminaScott?</h3>
<ul>
<li><strong>Deep Expertise:</strong> Our team comprises seasoned AI researchers, data scientists, and business consultants with decades of combined experience.</li>
<li><strong>Proven Track Record:</strong> We have successfully delivered AI solutions across 15+ industry sectors, from healthcare to financial services.</li>
<li><strong>End-to-End Support:</strong> From initial consultation through to deployment and ongoing optimisation, we are with you every step of the way.</li>
<li><strong>Ethical AI:</strong> We are committed to responsible AI practices, ensuring transparency, fairness, and accountability in every solution we deliver.</li>
</ul>',
            'meta_title' => 'About LuminaScott | AI Implementation Experts',
            'meta_description' => 'Learn about LuminaScott, a premier AI consultancy based in London. We help businesses harness artificial intelligence for real, measurable results.',
            'template' => 'about',
            'is_published' => true,
            'sort_order' => 1,
        ]);

        Page::create([
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => '<h2>Privacy Policy</h2>
<p>At LuminaScott, we take your privacy seriously. This policy outlines how we collect, use, and protect your personal information.</p>
<h3>Information We Collect</h3>
<p>We collect information you provide directly to us, such as when you fill in our contact form, subscribe to our newsletter, or engage our services.</p>
<h3>How We Use Your Information</h3>
<p>We use the information we collect to provide, maintain, and improve our services, to communicate with you, and to comply with legal obligations.</p>
<h3>Data Protection</h3>
<p>We implement appropriate technical and organisational measures to protect your personal data against unauthorised access, alteration, disclosure, or destruction.</p>
<p>For any queries regarding our privacy practices, please contact us at privacy@luminascott.com.</p>',
            'meta_title' => 'Privacy Policy | LuminaScott',
            'meta_description' => 'Read the LuminaScott privacy policy to understand how we collect, use, and protect your personal information.',
            'template' => 'default',
            'is_published' => true,
            'sort_order' => 10,
        ]);

        // Services
        $services = [
            [
                'title' => 'AI Strategy & Consulting',
                'slug' => 'ai-strategy-consulting',
                'excerpt' => 'Develop a comprehensive AI roadmap tailored to your business objectives and industry landscape.',
                'description' => '<p>Our AI Strategy & Consulting service helps organisations chart a clear path towards AI adoption. We begin with a thorough assessment of your current capabilities, data infrastructure, and business goals to create a bespoke AI strategy that delivers measurable ROI.</p>
<h3>What We Deliver</h3>
<ul>
<li>Comprehensive AI readiness assessment</li>
<li>Tailored AI roadmap with clear milestones</li>
<li>Technology stack recommendations</li>
<li>ROI projections and business case development</li>
<li>Change management and adoption planning</li>
</ul>
<p>Whether you are just beginning your AI journey or looking to scale existing initiatives, our consultants provide the strategic guidance you need to succeed.</p>',
                'icon' => 'strategy',
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Machine Learning Solutions',
                'slug' => 'machine-learning-solutions',
                'excerpt' => 'Custom machine learning models designed to solve your most complex business challenges.',
                'description' => '<p>We design, develop, and deploy bespoke machine learning models that transform raw data into actionable intelligence. From predictive analytics to natural language processing, our solutions are engineered to deliver real business value.</p>
<h3>Our Capabilities</h3>
<ul>
<li>Predictive analytics and forecasting</li>
<li>Natural language processing (NLP)</li>
<li>Computer vision and image recognition</li>
<li>Recommendation systems</li>
<li>Anomaly detection and fraud prevention</li>
</ul>
<p>Every model we build is rigorously tested, validated, and optimised for production environments, ensuring reliability and performance at scale.</p>',
                'icon' => 'brain',
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'AI Integration & Automation',
                'slug' => 'ai-integration-automation',
                'excerpt' => 'Seamlessly integrate AI capabilities into your existing systems and workflows.',
                'description' => '<p>Unlock the full potential of AI by integrating intelligent automation into your existing business processes. We specialise in connecting AI solutions with your current technology stack, minimising disruption whilst maximising impact.</p>
<h3>Integration Services</h3>
<ul>
<li>API development and integration</li>
<li>Workflow automation with AI</li>
<li>Legacy system modernisation</li>
<li>Cloud-based AI deployment</li>
<li>Real-time data pipeline architecture</li>
</ul>
<p>Our engineers ensure that every integration is robust, scalable, and secure, enabling your team to focus on what they do best.</p>',
                'icon' => 'cog',
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Data Analytics & Business Intelligence',
                'slug' => 'data-analytics-business-intelligence',
                'excerpt' => 'Transform your data into powerful insights that drive informed decision-making.',
                'description' => '<p>Data is the foundation of every successful AI initiative. Our data analytics services help you unlock the value hidden within your data, providing clear, actionable insights that inform strategic decisions.</p>
<h3>Services Include</h3>
<ul>
<li>Data strategy and governance</li>
<li>Advanced analytics and visualisation</li>
<li>Dashboard development</li>
<li>Data warehouse design</li>
<li>Regulatory compliance reporting</li>
</ul>',
                'icon' => 'chart',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'AI Training & Workshops',
                'slug' => 'ai-training-workshops',
                'excerpt' => 'Empower your team with the knowledge and skills to leverage AI effectively.',
                'description' => '<p>Building internal AI capability is essential for long-term success. Our training programmes and workshops are designed to upskill your team, from executive leadership to technical staff, ensuring everyone understands how to leverage AI in their roles.</p>
<h3>Training Programmes</h3>
<ul>
<li>Executive AI awareness sessions</li>
<li>Technical AI and ML bootcamps</li>
<li>Data literacy workshops</li>
<li>AI ethics and governance training</li>
<li>Hands-on project-based learning</li>
</ul>',
                'icon' => 'academic',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Conversational AI & Chatbots',
                'slug' => 'conversational-ai-chatbots',
                'excerpt' => 'Intelligent conversational interfaces that enhance customer experience and operational efficiency.',
                'description' => '<p>Deploy sophisticated conversational AI solutions that understand context, handle complex queries, and deliver exceptional user experiences. From customer service chatbots to internal knowledge assistants, we build conversational interfaces that truly work.</p>
<h3>Solutions</h3>
<ul>
<li>Customer service chatbots</li>
<li>Internal knowledge base assistants</li>
<li>Voice-enabled AI interfaces</li>
<li>Multi-lingual support systems</li>
<li>Sentiment analysis and escalation</li>
</ul>',
                'icon' => 'chat',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Testimonials
        $testimonials = [
            [
                'client_name' => 'James Worthington',
                'client_position' => 'Chief Technology Officer',
                'client_company' => 'Meridian Financial Group',
                'content' => 'LuminaScott transformed our approach to risk assessment entirely. Their machine learning models reduced our false positive rate by 73% and saved us millions in operational costs. Truly outstanding work.',
                'rating' => 5,
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Dr. Sarah Chen',
                'client_position' => 'Director of Innovation',
                'client_company' => 'HealthBridge NHS Trust',
                'content' => 'Working with LuminaScott on our patient triage system was a revelation. Their team understood the complexities of healthcare AI and delivered a solution that has genuinely improved patient outcomes. Exceptional professionalism throughout.',
                'rating' => 5,
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Oliver Pemberton',
                'client_position' => 'Managing Director',
                'client_company' => 'Sterling Logistics',
                'content' => 'The AI-powered route optimisation system LuminaScott built for us has been a game-changer. We have seen a 31% reduction in delivery times and significant fuel cost savings. Their team is brilliant, responsive, and deeply knowledgeable.',
                'rating' => 5,
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'client_name' => 'Emma Richardson',
                'client_position' => 'Head of Digital Transformation',
                'client_company' => 'Hartwell Retail Group',
                'content' => 'LuminaScott helped us implement a recommendation engine that increased our online sales by 45%. Their consultative approach meant the solution was perfectly aligned with our business needs. Highly recommended.',
                'rating' => 5,
                'is_published' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        // Team Members
        $team = [
            [
                'name' => 'Alexander Scott',
                'position' => 'Founder & Chief Executive Officer',
                'bio' => 'Alexander founded LuminaScott with a vision to make AI accessible to businesses of all sizes. With over 15 years of experience in technology consulting and AI research, he leads the company with a passion for innovation and a commitment to delivering exceptional results.',
                'linkedin' => 'https://linkedin.com/in/alexanderscott',
                'email' => 'alexander@luminascott.com',
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Dr. Priya Sharma',
                'position' => 'Chief AI Officer',
                'bio' => 'Dr. Sharma brings a wealth of academic and industry expertise to LuminaScott. With a PhD in Machine Learning from Imperial College London and extensive experience at leading tech firms, she oversees all AI strategy and technical delivery.',
                'linkedin' => 'https://linkedin.com/in/priyasharma',
                'email' => 'priya@luminascott.com',
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Thomas Blackwell',
                'position' => 'Head of Engineering',
                'bio' => 'Thomas leads our engineering team with a focus on building robust, scalable AI solutions. His background in cloud architecture and distributed systems ensures our deployments are enterprise-grade and production-ready.',
                'linkedin' => 'https://linkedin.com/in/thomasblackwell',
                'email' => 'thomas@luminascott.com',
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Charlotte Everly',
                'position' => 'Head of Client Relations',
                'bio' => 'Charlotte ensures every client receives exceptional service from initial consultation through to project delivery and beyond. Her background in business strategy and client management makes her an invaluable bridge between our technical team and our clients.',
                'linkedin' => 'https://linkedin.com/in/charlotteeverly',
                'email' => 'charlotte@luminascott.com',
                'is_published' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }

        // Portfolio Items
        $portfolio = [
            [
                'title' => 'Predictive Risk Engine for Meridian Financial',
                'slug' => 'predictive-risk-engine-meridian',
                'excerpt' => 'A bespoke machine learning system that revolutionised credit risk assessment for one of the UK\'s leading financial groups.',
                'description' => '<p>Meridian Financial Group needed a more sophisticated approach to credit risk assessment. We developed a custom machine learning engine that analyses over 200 data points in real-time, providing accurate risk scores and reducing false positives by 73%.</p><p>The solution integrates seamlessly with their existing core banking platform and processes over 10,000 applications daily with sub-second response times.</p>',
                'client_name' => 'Meridian Financial Group',
                'category' => 'Financial Services',
                'technologies' => ['Python', 'TensorFlow', 'AWS', 'PostgreSQL', 'Docker'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'AI-Powered Patient Triage System',
                'slug' => 'ai-patient-triage-system',
                'excerpt' => 'An intelligent triage system that helps NHS clinicians prioritise patient care more effectively.',
                'description' => '<p>Working closely with HealthBridge NHS Trust, we developed an AI-powered triage system that analyses patient symptoms, medical history, and real-time vital signs to recommend priority levels. The system has improved triage accuracy by 40% and reduced average waiting times significantly.</p>',
                'client_name' => 'HealthBridge NHS Trust',
                'category' => 'Healthcare',
                'technologies' => ['Python', 'scikit-learn', 'Azure', 'FHIR', 'React'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Intelligent Route Optimisation Platform',
                'slug' => 'route-optimisation-platform',
                'excerpt' => 'A real-time logistics optimisation system that dramatically reduced delivery times and costs.',
                'description' => '<p>Sterling Logistics required a solution to optimise their delivery network across the UK. We built a real-time route optimisation platform that considers traffic patterns, weather conditions, vehicle capacity, and delivery windows to generate the most efficient routes.</p><p>The platform resulted in a 31% reduction in delivery times and 22% savings in fuel costs within the first quarter of deployment.</p>',
                'client_name' => 'Sterling Logistics',
                'category' => 'Logistics',
                'technologies' => ['Python', 'Google OR-Tools', 'GCP', 'Redis', 'Vue.js'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Personalised Retail Recommendation Engine',
                'slug' => 'retail-recommendation-engine',
                'excerpt' => 'A sophisticated recommendation system that boosted online sales by 45% for a major retail group.',
                'description' => '<p>Hartwell Retail Group wanted to enhance their online shopping experience with personalised product recommendations. We built a collaborative filtering and content-based hybrid recommendation engine that analyses user behaviour, purchase history, and product attributes.</p><p>The engine serves personalised recommendations across web, mobile, and email channels, resulting in a 45% increase in online sales and a 28% improvement in customer retention.</p>',
                'client_name' => 'Hartwell Retail Group',
                'category' => 'Retail',
                'technologies' => ['Python', 'PyTorch', 'AWS', 'Elasticsearch', 'Next.js'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Automated Document Processing for Whitmore Legal',
                'slug' => 'automated-document-processing',
                'excerpt' => 'NLP-powered document analysis that reduced contract review time by 60% for a leading law firm.',
                'description' => '<p>Whitmore Legal Partners needed to process thousands of legal documents more efficiently. We developed an NLP-powered system that automatically extracts key clauses, identifies potential risks, and summarises complex legal documents, reducing manual review time by 60%.</p>',
                'client_name' => 'Whitmore Legal Partners',
                'category' => 'Legal',
                'technologies' => ['Python', 'spaCy', 'Hugging Face', 'Azure', 'FastAPI'],
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Smart Energy Management System',
                'slug' => 'smart-energy-management',
                'excerpt' => 'An AI-driven energy optimisation platform that reduced consumption by 35% across a commercial property portfolio.',
                'description' => '<p>Greenfield Properties manages a portfolio of over 50 commercial buildings. We implemented an AI-driven energy management system that monitors consumption patterns, predicts demand, and automatically adjusts HVAC and lighting systems to optimise energy usage.</p><p>The solution delivered a 35% reduction in energy consumption and contributed to the company achieving their net-zero targets ahead of schedule.</p>',
                'client_name' => 'Greenfield Properties',
                'category' => 'Energy',
                'technologies' => ['Python', 'TensorFlow', 'IoT Sensors', 'MQTT', 'Grafana'],
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($portfolio as $item) {
            PortfolioItem::create($item);
        }
    }
}
