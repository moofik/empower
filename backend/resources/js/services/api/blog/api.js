import ApiService from '@/services/api/apiService'
import {createBlogArticleMock, BLOG_CONTENT, fetchMocksByPrefix, MAP_KEYS, BLOG_DESCRIPTION} from "@/services/api/mocks";

export default {
    fetchRelativePosts(id) {
        return this.fetchLatestPosts(3).filter(post => post.id != id);
    },

    fetchPost(id) {
        let results = fetchMocksByPrefix(MAP_KEYS.POST + id);

        if (results.length > 0) {
            return results[0];
        }

        return null;
    },
    fetchLatestPosts(limit) {
        let result = fetchMocksByPrefix(MAP_KEYS.POST);

        if (result.length) {
            return result.slice(0, limit).sort((a, b) => (a.published_at > b.published_at ? -1 : 1));
        }

        let latest = [
            createBlogArticleMock(
                '1962 FERRARI 250 GTO SETS NEW AUCTION RECORD AT $48.4 MILLION',
                '',
                BLOG_CONTENT.FERRARI,
                BLOG_DESCRIPTION.FERRARI,
                'post_1',
                '08/28/2018'
            ),
            createBlogArticleMock(
                'Hyundai\'s Santa Fe strategy',
                '',
                BLOG_CONTENT.HYNDAI,
                BLOG_DESCRIPTION.HYNDAI,
                'post_2',
                '07/28/2018'
            ),
            createBlogArticleMock(
                'GM loses another legal battle over dealer scoring',
                '/images/news/sm-5b84da4e2de2b-1.jpg',
                BLOG_CONTENT.GM_POST,
                BLOG_DESCRIPTION.GM_POST,
                'post_3',
                '06/28/2018'
            )
        ];

        if (limit) {
            latest = latest.slice(0, limit);
        }

        return latest;
    }
}
